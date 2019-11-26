//Programa: Monitoracao de planta usando Arduino
//Autor: FILIPEFLOP
// Modificado por Leonardo Eliel Dias da Silva

#define sinal_sensor A0
int IN1 = 4;
int IN2 = 5;
int LED = 13;
int valor_analogico;

void setup()
{  
  pinMode(sinal_sensor, INPUT);
  pinMode(LED, OUTPUT);
  pinMode(IN1, OUTPUT);
  pinMode(IN2, OUTPUT);
  Serial.begin(9600);
}

void loop()
{  
  valor_analogico = analogRead(sinal_sensor);
    
  Serial.println(valor_analogico);
  if (Serial.available()) {
    
    char python = Serial.read();
    
    if (python == 'L') {      
      digitalWrite(LED, HIGH);
      digitalWrite(IN1, HIGH);
      digitalWrite(IN2, LOW);      
      delay(5000);
      digitalWrite(IN1, LOW);
      digitalWrite(IN2, LOW);
      digitalWrite(LED, LOW);            
    }
    if (python == 'D') {      
        digitalWrite(LED, HIGH);
        digitalWrite(IN1, LOW);
        digitalWrite(IN2, HIGH);      
        delay(5000);
        digitalWrite(IN1, LOW);
        digitalWrite(IN2, LOW);
        digitalWrite(LED, LOW);            
      }   
  }
  delay(1000);
}
