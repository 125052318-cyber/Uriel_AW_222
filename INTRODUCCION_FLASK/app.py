#Importamos la libreria de flak
from flask import Flask , render_template, redirect

#Creamos una instancia del proyecto
app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"]=True

#creacion de rutas
@app.route("/")
#Creamos una funcion que se llama home
def home():
    return render_template("index.html")

@app.route("/guardar")
def guardar():
 return "Producto guardado correctamente"

@app.route("/login")
def login():
   return render_template("login.html")

@app.route("/logout")
def logout():
   return redirect("login")

#Ejecutar el proyecto en el puerto
if __name__ == "__main__":
    app.run(port=5000)