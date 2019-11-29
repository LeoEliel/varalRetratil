int IN1 = 4;

int IN2 = 5;
void setup() {
  // put your setup code here, to run once:
pinMode(IN1, OUTPUT);
pinMode(IN2, OUTPUT);
}







void loop() {  
  digitalWrite(IN1, HIGH);
  digitalWrite(IN2, LOW);    
  delay(3000);
  digitalWrite(IN1, LOW);
  digitalWrite(IN2, LOW); 
}
