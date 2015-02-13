int LED = 7;
int botao = 4;
int flagBotao = 0;

void setup()
{
  pinMode(LED, OUTPUT);
  pinMode(botao, INPUT);
  
}

void loop()
{
  flagBotao = Serial.read();
    
  if(flagBotao == 1)
  {
    digitalWrite(LED, HIGH);
  }
  else
  {
    digitalWrite(LED, LOW);
  }
  
  
}
