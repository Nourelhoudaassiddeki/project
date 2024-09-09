#ifndef LIFEFORM_H
#define LIFEFORM_H
#include "const.h"
#include "shape.h"
#include "message.h"
#include <cmath>
#include <iostream>
using namespace std;
class lifeform {
  protected : 
  int age; // age
    s2d pos; // Position dans l'espace 2D
public:

lifeform();
  lifeform( double,double,int);
  void test_age();
  void test_position();
  double get_x();
  double get_y();
};
class algue : public lifeform {
public:
 algue();
 algue(double,double,int);
};
class corail : public lifeform {
  int id;
  int segment_nbre ;
  Segment* segments ;
   Status_cor sc;
   Dir_rot_cor Dc;
   Status_dev sd;
  static int *tab_id;
  static int indice_id;
public:
  corail(double,double,int,int,int,int,int,int);
  corail();
  int get_segment_nbre();
 Segment* get_seg();
 int* get_tab_id();
 int get_indice_id();
 void create_segment(double *ang,double* longueur);
 void test_position();
 void duplicate_id();
 void seg_long();
 void seg_ang();
 int get_id();
};
class scavenger : public lifeform{
	double rayon;
	int id_cor;
     Status_sca Sc;
    public:
    scavenger();
    scavenger(double,double,int,double,int,int);
    void test_id_cor();
    void test_rayon();
};
#endif