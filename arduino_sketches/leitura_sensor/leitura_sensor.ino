//Programa: Monitoracao de planta usando Arduino
//Autor: FILIPEFLOP
// Modificado por Leonardo Eliel Dias da Silva
 
#define pino_sinal_analogico A0
 
int valor_analogico;
 
void setup()
{
  Serial.begin(9600);
  pinMode(pino_sinal_analogico, INPUT);
  Serial.print("Teste Sensor de Umidade!");
}
 
void loop()


{
  //Le o valor do pino A0 do sensor
  valor_analogico = analogRead(pino_sinal_analogico);
 
  //Mostra o valor da porta analogica no serial monitor
  Serial.print("Leitura da Porta analogica: ");
  Serial.print(valor_analogico);
  delay(1000);
}
 
