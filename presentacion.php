<!DOCTYPE html>
<html lang="es">
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>IEA</title>

     <!-- Bootstrap core CSS -->
     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom fonts for this template -->
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="css/grayscale.min.css" rel="stylesheet">

</head>
<body>
     <section class="contact-section bg-black">
          <div class="container px-4 px-lg-5">
          <header>
               <a href="index.html" class="logo"><h2 class="text-white mb-5">Instituto de Electrónica Aplicada</h2></a>
          </header>
          
          <div class="row gx-4 gx-lg-5">
               <div class="col-md-6 mb-3 mb-md-0">
               <div class="card py-4 h-100">
                    <img src="./img/draw.svg" class="img-fluid" alt="Responsive image">
               </div>
               </div>
          <div class="col-md-6 mb-3 mb-md-0">
              
               <div class="card text-center py-4 h-100">
                         <h1 class="display-1">
                         <div id="typed-strings">
                         <div id="notificacion"></div>
                         </div>
                         <div id="temperatura"></div>
                         </div>
                         <span id="typed"></span>
                         </h1>
                         
               </div>
          </div>
          </div>
          </div>  
          
     </section>
     <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2022</div></footer>
     <script src="https://cdn.socket.io/4.5.0/socket.io.min.js" integrity="sha384-7EyYLQZgWBi67fBtVxw60/OWl1kjsfrPFcaU0pp0nAh+i8FD068QogUvg85Ewy1k" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.js"
     integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
     crossorigin="anonymous">
     </script>
     <script type="text/javascript">
// CommonJS
     const socket = io('http://143.198.142.84:3000/', {transports:['websocket', 'polling', 'flashsocket']});
     let notificacion = document.getElementById('notificacion');
     socket.on("saludo_socket", function(data){
          notificacion.innerHTML = `<p>Bienvenido al IEA ${data}</p>`;
          console.log(data);   
          decir(`Bienvenido al IEA ${data}`); 
     });
     socket.on("despido_socket", function(data){
          notificacion.innerHTML = `<p>Hasta luego ${data}</p>`;
          console.log(data);   
          decir(`Hasta luego ${data}`); 
     });
     socket.on("temperatura_socket", function(data){
          decir(`Por favor, acerque su frente al sensor de temperatura`); 
     });

     let temperatura = document.getElementById('temperatura');
     socket.on("medir_temperatura_socket", function(data){
          temperatura.innerHTML = `<p>Tu temperatura es ${data}</p>`;
          console.log(data);   
          decir(`${data} grados centígrados`); 
     });

     socket.on("temperatura_socket2", function(data){
          decir(`Temperatura alta, por favor, vuelva a medirse la temperatura`); 
     });
     socket.on("temperatura_socket3", function(data){
          decir(`Temperatura alta, por favor, visite a su médico de cabecera`); 
     });
     socket.on("desinfeccion_c", function(data){
          decir(`muy bien, ahora párese en el área de desinfección`); 
     });
     socket.on("desinfeccion_m", function(data){
          decir(`Por favor, ponga su mano el dispositivo de desinfección`); 
     });
     socket.on("terminar", function(data){
          decir(`Todo correcto, adelante.`); 
     });
     socket.on("limpiar_pantalla", function(data){
          notificacion.innerHTML = `<p></p>`;
          temperatura.innerHTML = `<p></p>`;
     });

     function decir(texto){
          let utterance = new SpeechSynthesisUtterance();
          utterance.lang = "es-MX";
          utterance.volume = 1;
          utterance.text = texto;
          speechSynthesis.speak(utterance);
          var voices = speechSynthesis.getVoices();
          console.log(voices);
     };
     
     
     </script>

</body>
</html>
