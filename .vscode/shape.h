#ifndef SHAPE_H
#define SHAPE_H

#include "const.h"
#include "message.h"
#include <cmath>
#include <iostream>
using namespace std;

struct s2d{
    double x;
    double y;
};

class Segment{
    int index;
    s2d base;
    s2d extr;
    double angle;
    double longueur;
public:
    double getangle();
    Segment(double a,double b , double gl, double lg,int i);
    Segment();
    int get_index();
    double get_base_x();
    double get_base_y();
    double  get_extr_x();
    double  get_extr_y();

    s2d get_base();

    s2d get_extr();
    double get_angle();
    double get_longueur();
    void set_indice(int);
    void set_base_x(double);
    void set_base_y(double);
    void  set_extr_x(double);
    void  set_extr_y(double);
    void set_angle(double);
    void set_longueur(double);
    void extremite();
friend double ecartangulaire(Segment& seg1, Segment& seg2);
friend bool Onsegment(s2d p, s2d q, s2d r);
friend int orientation(s2d p, s2d q, s2d r);
friend bool Intersect(s2d p1, s2d q1, s2d p2, s2d q2);
friend void superposition(int id, Segment A, Segment B);
friend void inter_is_exist(Segment A, Segment B, int id1,int id2);};

double ecartangulaire(Segment&, Segment&);
bool Onsegment(s2d p, s2d q, s2d r);
int orientation(s2d p, s2d q, s2d r);
bool Intersect(s2d p1, s2d q1, s2d p2, s2d q2);
void superposition(int id, Segment A, Segment B);
void inter_is_exist(Segment A, Segment B, int id1,int id2);






const double epsilon = 1e-9;

#endif