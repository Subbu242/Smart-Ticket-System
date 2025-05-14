#include <Servo.h> 
Servo Servo1; 

int servoPin = 3; 
int pos = 0;
const int buzzer=8;
const int yellow=11;
const int green=12;
const int red=13;


void setup() 
{
    pinMode(red, OUTPUT);
    pinMode(yellow, OUTPUT);
    pinMode(green, OUTPUT);
    Servo1.attach(servoPin); 
    
    
}
void loop() 
{

  int a=1; //0=unreconized; >1 = recognized; 
      digitalWrite(green, LOW);
      digitalWrite(red, LOW);
      digitalWrite(yellow, HIGH);
      delay(5000);
  if(a==0)
  {
      digitalWrite(green, LOW);
      digitalWrite(red, HIGH);
      digitalWrite(yellow, LOW);
      tone(buzzer, 1000); 
      delay(1000);        
      noTone(buzzer);     
      delay(1000); 
  }
  else
  {
      digitalWrite(green, HIGH);
      digitalWrite(red, LOW);
      digitalWrite(yellow, LOW);
      for (pos = 0; pos <= 90; pos += 1) 
      { 
        Servo1.write(pos);             
        delay(10);                       
      }
      tone(buzzer, 4000); 
      delay(5000);        
      noTone(buzzer);     
      delay(5000);
      for (pos = 90; pos >= 0; pos -= 1) 
      { 
        Servo1.write(pos);             
        delay(10);                       
      }
  }
      digitalWrite(green, LOW);
      digitalWrite(red, LOW);
      digitalWrite(yellow, HIGH);
      delay(6000);
}
