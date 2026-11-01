#Importamos la libreria de flak
from flask import Flask, render_template, redirect, request, session, url_for
#Importamos las funciones de Mysql
from flask_mysqldb import MySQL

#Importamos librerias para generar un hash y comprobar que el hash coincida con la contraseña
from werkzeug.security import generate_password_hash , check_password_hash

#Creamos una instancia del proyecto
app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"]=True

#Conexion de base de datos
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'flasktiid'
app.secret_key = 'mysecretkey'

mysql = MySQL(app)

#creacion de rutas
@app.route("/" , methods=["GET" , "POST"])
#Creamos una funcion que se llama home
def login():
    if request.method == "POST":
        #Recibimos los datos que el usuario escribio en el login 
        correo_form = request.form["correo"]
        password_form = request.form["password_hash"]

        #Abrimos el cursor para abrir la base de datos 
        cursor = mysql.connection.cursor()
        sql = """
        SELECT 
        usuarios.id,
        usuarios.nombre,
        usuarios.apellido_p,
        usuarios.apellido_m,
        usuarios.correo,
        usuarios.password_hash,
        roles.nombre
        FROM usuarios
        INNER JOIN roles
        ON usuarios.id_rol = roles.id_rol
        WHERE usuarios.correo = %s
        """

        #Aqui buscamos en todos los datos del usuario que tenga ese correo 
        cursor.execute (sql , (correo_form,))

        #fetchone() solo trae un registro (El primero que encuentre)
        usuario = cursor .fetchone()
        cursor.close()

        if usuario and check_password_hash(usuario[5] , password_form):
            session["id_usuario"] = usuario[0]
            session["nombre"] = usuario[1]
            session["rol"] = usuario[6]

            if session["rol"] =="Administrador":
                return redirect(url_for("admin"))

            return redirect(url_for("usuario"))

        return render_template(
            "login.html",
            error = "Correo o contraseña incorrectos"
        )
        
    return render_template("login.html")


#RUTA DE ADMINISTRADOR
@app.route("/admin")
def admin():
    if "id_usuario" not in session:
        
        return redirect(url_for("login"))

    if session.get("rol") != "Administrador":
        return "Acceso denegado"

    return render_template("administrador.html" , nombre=session["nombre"])
    
#Ruta de usuario
@app.route("/usuario")
def usuario():

    if "id_usuario" not in session:
        return redirect(url_for("login"))

    if session.get("rol") != "Usuario":
        return "Acceso denegado"

    return render_template("usuarios.html" , nombre=session["nombre"])


#Ruta de logout
@app.route("/logout")
def logout():
    session.clear()

    return redirect(url_for("login"))

""" En esta parte se le indica a FLASK que podemos manejar dos situaciones distintas mediante el GET/POST """
""" GET: Su funcion es unicamente cuando el usuario simplemente escribe la URL o se mete a REGISTRATE """
""" POST: Sirve cuando el usuario esta llenando el formulario, ya que cuando el usuario presiona registrarse viene con un paquete de datos ocultos """

@app.route("/registro" , methods=["GET","POST"])
def registro():
    """ REGlA: los nombres que se encuentran entre corchetes deben de coincidir con el input del archivo registro.html """
    if request.method == "POST":
        nombre = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password_hash = request.form["password_hash"]
        id_rol = request.form["id_rol"]

        """ Ocultamos la contraseña, la encriptamos y esto ayuda para que en dado caso de que sea hackeada la DB no se pueda decifrar """

        password = generate_password_hash(password_hash)

        """ CURSOR: Esta herramienta nos permite que Python se comunique con MySQL, le envia instrucciones y le devuelven las respuestas """
        cursor = mysql.connection.cursor()

        """ CONSULTA """
        """ Usamos %s como comodines para despues pasar los datos reales mediante la variable "valores", esto para evitar ataques conocidos como inyección SQL  """
        consulta = "INSERT INTO usuarios (nombre , apellido_p , apellido_m , correo , password_hash , id_rol) VALUES (%s , %s , %s , %s , %s , %s)"
        valores = (nombre , apellido_p , apellido_m , correo , password , id_rol)
        cursor.execute(consulta , valores)

        """ El commit es equivalente a "GUARDAR" en MySQL sin esto se descartaria la consulta """
        mysql.connection.commit()
        """ Cerramos el cursor """
        cursor.close()
        """ Lo redireccionamos a login """
        return redirect("/")
    return render_template("registro.html")


#Ejecutar el proyecto en el puerto
if __name__ == "__main__":
    app.run(port=5000)