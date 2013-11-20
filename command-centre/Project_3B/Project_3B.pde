import vialab.SMT.*;

  PImage i_bg;
  
  PImage i_move_btn, i_move_btn_s0, i_move_btn_s1;
  
  PImage i_alert_btn;
  PImage i_regroup_btn;
  
  PImage i_sq0;
  PImage i_sq1;
  
  int squad_sel = -1;
  
  Zone background;
  Zone commands0, commands1, commands2;
  Zone squads0, squads1;
    final int BUTTON_SIZE = 128;
  
void setup(){ 
  size(1024, 768, P3D); 
  SMT.init(this, TouchSource.MULTIPLE);
  
  i_bg = loadImage("background.jpg");
  
  i_move_btn = loadImage("movebtn.png");
  i_move_btn_s0 = loadImage("movebtns0.png");
  i_move_btn_s1 = loadImage("movebtns1.png");
  
  i_alert_btn = loadImage("alertbtn.png");
  i_regroup_btn = loadImage("regroupbtn.png");
  
  i_sq0 = loadImage("sq0.png");
  i_sq1 = loadImage("sq1.png");
  
  background = new ImageZone ("background", i_bg, -500, -500, i_bg.width, i_bg.height);
  commands0 = new ImageZone ("move", i_move_btn, 0, 0, BUTTON_SIZE, BUTTON_SIZE, 255);
  commands1 = new ImageZone ("alert", i_alert_btn, 0, 0 + commands0.height, BUTTON_SIZE, BUTTON_SIZE);
  commands2 = new ImageZone ("regroup", i_regroup_btn, 0, 0+commands0.height + commands1.height, BUTTON_SIZE, BUTTON_SIZE);
  
  squads0 = new ImageZone ("squad0", i_sq0, 0, commands0.height + commands1.height + commands2.height, BUTTON_SIZE, BUTTON_SIZE);
  squads1 = new ImageZone ("squad1", i_sq1, 0, commands0.height + commands1.height + commands2.height + squads0.height, BUTTON_SIZE, BUTTON_SIZE);
          
  SMT.add(background); // adding the parent to SMT  
  
  SMT.add(commands0);
  SMT.add(commands1);
  SMT.add(commands2);
    
  SMT.add(squads0);
  SMT.add(squads1);
}

void touchBackground(Zone zone){
  zone.rst(false, true, true); // enable dragging
}

void touchMove(Zone zone){
  ImageZone iz = (ImageZone)zone;
  
  if (squad_sel == 0){
    iz.img = i_move_btn_s0;
  }
  else if (squad_sel == 1){
    iz.img = i_move_btn_s1;
  }
  else{
    iz.img = i_move_btn;
  }
  
}

void touchUpMove (Zone z, Touch t){
  ImageZone iz = (ImageZone)z;
  
  //iz.img = i_move_btn;
}


void touchAlert(Zone zone){
}
void touchRegroup(Zone zone){
}
void touchSquad0(Zone zone){
  squad_sel = 0;
}
void touchSquad1(Zone zone){
  squad_sel = 1;
}

void draw(){
  background(53, 123, 51);
}
