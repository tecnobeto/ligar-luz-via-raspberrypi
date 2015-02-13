int ledPin = 13;
char valor_recebido;

void setup()
{
  Serial.begin(9600);
  pinMode(ledPin, OUTPUT);

}

void loop()
{
   valor_recebido = Serial.read();
   if(valor_recebido == '1' )
   {
       digitalWrite(ledPin, HIGH);
       Serial.println("0 led conectado ao pino 13 foi ligado!");
   }
   if(valor_recebido == '2' )
   {
       digitalWrite(ledPin, LOW);
       Serial.println("O led conectado ao pino 13 foi DESLIGADO!");
   }
   
}
