

#include <ESP8266WiFi.h>
#include <DHT.h>

//Se declara el sensor DHT 11
#define DHTTYPE DHT11

// Reemplazar con usuario y clave de su red
//const char* ssid ="autoacceso";
//const char* ssid ="scomputo";
//const char* ssid ="computo_pa.edu.mx";
//const char* ssid ="Network-J";
//const char* password = "18273645";
const char* ssid ="wifi_unca";

//const char* ssid ="Mi red";
//const char* password = "99oooo17b";

// Servidor Web en puerto 80
WiFiServer server(80);

// Sensor DHT 
const int DHTPin = 2;
// Inicializar Sensor DHT 
DHT dht(DHTPin, DHTTYPE);

void setup() {
  // Inicializar puerto serial
  Serial.begin(115200);
  dht.begin();
  
  // Conectando con la red WiFi
  Serial.println();
  Serial.print("Conectando con ");
  Serial.println(ssid);
  
  WiFi.begin(ssid);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi conectado");
  
  // Arranque del servidor Web
  server.begin();
  Serial.println("Direccion IP:");
  delay(10000);
  
  // Imprimiendo direccion IP
  Serial.println(WiFi.localIP());
}

void loop() {
  // Esperando por nuevos clientes
  WiFiClient client = server.available();

  
  if (client) {
    Serial.println("Nuevo cliente");
    // Boleano para identificar cuando finaliza la solicitud HTTP
    boolean line = true;
    while (client.connected()) {
      if (client.available()) {
        char c = client.read();
        
        if (c == '\n' && line) {
            // Humedad
            //float h = dht.readHumidity();
            //Temperatura en Celsius
            //float t = dht.readTemperature();

         float h = dht.readHumidity();
          // Leemos la temperatura en grados centígrados (por defecto)
         float t = dht.readTemperature();
          // Leemos la temperatura en grados Fahreheit
         float f = dht.readTemperature(true);
            
            // Verifique si alguna lectura falló (intentar de nuevo).
            //if (isnan(H) || isnan(T)) {
              //Serial.println("Fallo al leer el sensor DHT11");
              //return;     
            //}

              if (isnan(h) || isnan(t) || isnan(f)) {
            Serial.println("Error obteniendo los datos del sensor DHT11");
            return;
               }
            
            client.println("HTTP/1.1 200 OK");
            client.println("Content-Type: text/html");
            client.println("Connection: close");
            client.println();
            // Servidor Web muestra datos de temperatura y humedad
            client.println("<!DOCTYPE HTML>");
            client.println("<html>");
           // client.println("<head><meta http-equiv=""refresh""></head><body><h1>SENSOR UNO");
            
            client.println("<style>html { font-family: Helvetica; display: inline-block; margin: 0px auto; text-align: center;}\n");
            client.println("body{margin-top: 50px;} h1 {color: #FFFFFF;margin: 50px auto 30px;}\n");
            client.println("p {font-size: 24px;color: #FFFFFF;margin-bottom: 10px;}\n");

           
            
             client.println("</style>\n");
             client.println(" <body style=background-color:LIGHTSKYBLUE;>");
             client.println("</body>");
             client.println("<fieldset>");
             
            client.println("<h1><font color=orange> <font face=Comic Sans MS,arial,verdana>Temperatura: </font></font>");
            client.println(t);
            client.println("*C</h1>");
             client.println("<h1><font color=dodgerblue> <font face=Comic Sans MS,arial,verdana>Humedad: </font></font>");
            client.println(h);
            
            //client.println("<h4>Humedad: ");
          
          
            client.println("%</h1>");
            client.println("</fieldset>");
            client.println("</body></html>");     
            break;
        }
        if (c == '\n') {
          // Cuando comienza a leer una nueva linea
          line = true;
        }
        else if (c != '\r') {
          // Cuando en encuntra un caracter en la línea actual
          line = false;
        }
      }
    }  
    // closing the client connection
    delay(1);
    client.stop();
    Serial.println("Cliente desconectado");
  }
}   
