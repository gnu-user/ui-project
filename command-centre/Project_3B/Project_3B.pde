import vialab.SMT.*;

  PImage i_bg;
  
  PImage i_move_btn, i_move_btn_s0, i_move_btn_s1;
  
  PImage i_alert_btn;
  PImage i_regroup_btn;
  
  PImage i_sq0;
  PImage i_sq1;
  
  PImage isq1_member;
  PImage isq1_leader;
  
  PImage isq1_regroup;
  PImage isq2_regroup;
  
  PImage isq2_member;
  PImage isq2_leader;
  
  Zone sq1_member;
  Zone sq1_leader; 
  Zone sq2_member; 
  Zone sq2_leader;
  
  Zone radial;
  PImage iradial;
  
  PImage i_moveMarker;
  PImage i_alertMarker;
  
  int squad_sel = -1;
  
  Boolean move, alert, regroup = false;
  
  Zone moveMarker;
  Zone alertMarker;
  
  Zone background;
  Zone commands0, commands1, commands2;
  Zone squads0, squads1;
  final int BUTTON_SIZE = 128;
  
void setup(){ 
  size(1024, 768, P3D); 
  SMT.init(this, TouchSource.MULTIPLE);
  
  i_bg = loadImage("background.jpg");
  
  i_moveMarker = loadImage("movemarker.png");
  i_alertMarker = loadImage("alertmarker.png");
  
  i_move_btn = loadImage("movebtn.png");
  i_move_btn_s0 = loadImage("movebtns0.png");
  i_move_btn_s1 = loadImage("movebtns1.png");
  
  i_alert_btn = loadImage("alertbtn.png");
  i_regroup_btn = loadImage("regroupbtn.png");
  
  i_sq0 = loadImage("sq0.png");
  i_sq1 = loadImage("sq1.png");
  
  isq1_member = loadImage("squad1.png");
  isq1_leader = loadImage("squad1l.png");
  
  isq1_regroup = loadImage("squad1re.png");
  isq2_regroup = loadImage("squad1re.png");
  
  isq2_member = loadImage("squad2.png");
  isq2_leader = loadImage("squad2l.png");
  
  iradial = loadImage("radial.png");
  radial = new ImageZone ("radialMarker", iradial, -1000,-1000, 1, 1);
  
  sq1_member = new ImageZone ("sq1_member", isq1_member, 964, 399, 40, 40);
  sq1_leader = new ImageZone ("sq1_leader", isq1_leader, 1043, 555, 40, 40);
  
  sq2_member = new ImageZone ("sq2_member", isq2_member, 885, 850, 40, 40);
  sq2_leader = new ImageZone ("sq2_leader", isq2_leader, 1256, 857, 40, 40);
  
  background = new ImageZone ("background", i_bg, -500, -500, i_bg.width, i_bg.height);
  commands0 = new ImageZone ("move", i_move_btn, 0, 0, BUTTON_SIZE, BUTTON_SIZE, 255);
  commands1 = new ImageZone ("alert", i_alert_btn, 0, 0 + commands0.height, BUTTON_SIZE, BUTTON_SIZE);
  commands2 = new ImageZone ("regroup", i_regroup_btn, 0, 0+commands0.height + commands1.height, BUTTON_SIZE, BUTTON_SIZE);
  
  squads0 = new ImageZone ("squad0", i_sq0, 0, commands0.height + commands1.height + commands2.height, BUTTON_SIZE, BUTTON_SIZE);
  squads1 = new ImageZone ("squad1", i_sq1, 0, commands0.height + commands1.height + commands2.height + squads0.height, BUTTON_SIZE, BUTTON_SIZE);
          
  moveMarker = new ImageZone("moveMarker", i_moveMarker, -1000,-1000,1, 1);
  alertMarker = new ImageZone("alertMarker", i_alertMarker, -1000,-1000,1, 1);
  
  background.add(moveMarker);
  
  background.add(sq1_member);
  background.add(sq1_leader);
  background.add(sq2_member);
  background.add(sq2_leader);
  
  SMT.add(radial);
  SMT.add(background);
  
  SMT.add(commands0);
  SMT.add(commands1);
  SMT.add(commands2);
    
  SMT.add(squads0);
  SMT.add(squads1);
}

void touchBackground(Zone zone){
  zone.rst(false, true, true); // enable dragging
  radial.removeFromParent();
}

void touchUpBackground(Zone z, Touch t){
  if (move == true){
    moveMarker.removeFromParent();
    moveMarker = new ImageZone("moveMarker", i_moveMarker, round(t.getLocalX(z)) - 50, round(t.getLocalY(z)) - 50, 100, 100);
    background.add(moveMarker); 
    println(t.x +","+ t.y);
    ImageZone iz = (ImageZone) commands0;
    iz.img = i_move_btn;
    move = false;
  }
  else if (alert == true){
    alertMarker.removeFromParent();
    alertMarker = new ImageZone("alertMarker", i_alertMarker, round(t.getLocalX(z)) - 50, round(t.getLocalY(z)) - 50, 100, 100);
    background.add(alertMarker); 
    println(t.x +","+ t.y);
    alert = false;
  }
  else if (regroup == true){
    
  }
}

void touchAlertMarker(Zone zone){
  zone.drag();
}

void touchUpAlertMarker(Zone z, Touch t){
  println(t.currentTime.subtract(t.startTime).getSeconds());
  if (t.currentTime.subtract(t.startTime).getSeconds() > 1){
    alertMarker.removeFromParent();
  }
}

void touchMoveMarker(Zone zone){
  zone.drag();
}

void touchUpMoveMarker (Zone z, Touch t){
  println(t.currentTime.subtract(t.startTime).getSeconds());
  if (t.currentTime.subtract(t.startTime).getSeconds() > 1){
    moveMarker.removeFromParent();
  }
}

void touchMove(Zone zone){
  ImageZone iz = (ImageZone)zone;
  
  iz.tintColour = 50;
}

void touchUpMove (Zone z, Touch t){
  ImageZone iz = (ImageZone)z;
  iz.tintColour = 255;
    alert = false;
  regroup = false;
  
  if (squad_sel == -1){
    iz.img = i_move_btn;
    println("move selected, no squad");
  }
  else if (squad_sel == 0){
    iz.img = i_move_btn_s0;
    move = true;
    println("move selected, squad 1");
  }
  else if (squad_sel == 1){
    iz.img = i_move_btn_s1;
    move = true;
    println("move selected, squad 2");
  }
  squad_sel = -1;
}
void touchAlert(Zone zone){
  ImageZone iz = (ImageZone)zone;
  move = false;
  regroup = false;
  alert = true;
  iz.tintColour = 50;
}
void touchUpAlert (Zone z, Touch t){
  ImageZone iz = (ImageZone)z;
  iz.tintColour = 255;
}
void touchRegroup(Zone zone){
  ImageZone iz = (ImageZone)zone;
  move = false;
  regroup = true;
  alert = false;
  iz.tintColour = 50;
  ImageZone sq1 = (ImageZone) sq1_leader;
  sq1.img = isq1_regroup;
  ImageZone sq2 = (ImageZone) sq2_leader;
  sq2.img = isq2_regroup;
}
void touchUpRegroup (Zone z, Touch t){
  ImageZone iz = (ImageZone)z;
  iz.tintColour = 255;
  ImageZone sq1 = (ImageZone) sq1_leader;
  sq1.img = isq1_leader;
  ImageZone sq2 = (ImageZone) sq2_leader;
  sq2.img = isq2_leader;
}
void touchSquad0(Zone zone){
  ImageZone iz = (ImageZone)zone;
  iz.tintColour = 50;
}
void touchUpSquad0(Zone z, Touch t){
  ImageZone iz = (ImageZone)z;
  iz.tintColour = 255;
  squad_sel = 0;
  move = false;
  regroup = false;
  alert = false;
}
void touchSquad1(Zone zone){
  ImageZone iz = (ImageZone)zone;
  iz.tintColour = 50;
}
void touchUpSquad1(Zone z, Touch t){
  ImageZone iz = (ImageZone)z;
  iz.tintColour = 255;
  squad_sel = 1;
  move = false;
  regroup = false;
  alert = false;
}

void touchSq1_member(Zone z){
  z.drag();
}
void touchSq1_leader(Zone z){
  z.drag();
}

void touchSq2_member(Zone z){
  z.drag();
}
void touchSq2_leader(Zone z){
  z.drag();
}

void touchRadial(Zone z){
  z.removeFromParent();
}


void touchUpSq1_member(Zone z, Touch t){
  println(t.currentTime.subtract(t.startTime).getSeconds());
  if (t.currentTime.subtract(t.startTime).getSeconds() > 0){
    radial.removeFromParent();
    radial = new ImageZone("radial", iradial, round(t.getLocalX(z)) - 100, round(t.getLocalY(z)) - 100, 200, 200);
    sq1_member.add(radial);
  }
}
void touchUpSq1_leader(Zone z, Touch t){
  println(t.currentTime.subtract(t.startTime).getSeconds());
  if (t.currentTime.subtract(t.startTime).getSeconds() > 0){
    radial.removeFromParent();
    radial = new ImageZone("radial", iradial, round(t.getLocalX(z)) - 100, round(t.getLocalY(z)) - 100, 200, 200);
    sq1_leader.add(radial);
  }
}

void touchUpSq2_member(Zone z, Touch t){
   println(t.currentTime.subtract(t.startTime).getSeconds());
  if (t.currentTime.subtract(t.startTime).getSeconds() > 0){
      if (t.currentTime.subtract(t.startTime).getSeconds() > 0){
    radial.removeFromParent();
    radial = new ImageZone("radial", iradial, round(t.getLocalX(z)) - 100, round(t.getLocalY(z)) - 100, 200, 200);
    sq2_member.add(radial);
  }
  } 
}
void touchUpSq2_leader(Zone z, Touch t){
  println(t.currentTime.subtract(t.startTime).getSeconds());
  if (t.currentTime.subtract(t.startTime).getSeconds() > 0){
      if (t.currentTime.subtract(t.startTime).getSeconds() > 0){
    radial.removeFromParent();
    radial = new ImageZone("radial", iradial, round(t.getLocalX(z)) - 100, round(t.getLocalY(z)) - 100, 200, 200);
    sq2_leader.add(radial);
  }
  }
}

void draw(){
  background(53, 123, 51);
}
