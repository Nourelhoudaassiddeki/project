#include <cmath>
#include <iostream>
#include <fstream>
#include <string>
#include "message.h"
#include "lifeform.h"
#include "shape.h"
using namespace std;
lifeform::lifeform(){};
lifeform::lifeform(double x, double y, int a)
{
    pos.x = x;
    pos.y = y;
    age = a;
}
double lifeform::get_x()
{
    return pos.x;
}

double lifeform::get_y()
{
    return pos.y;
}
void lifeform::test_age()
{
    if (!(age > 0))
    {
        cout << message::lifeform_age(age) << endl;
        exit(EXIT_FAILURE);
    }
}
void lifeform::test_position()
{
    if (pos.x < 1 || pos.x > dmax - 1 || pos.y < 1 && pos.y > dmax - 1)
    {
        cout << message::lifeform_center_outside(pos.x, pos.y) << endl;
        exit(EXIT_FAILURE);
    }
}

algue::algue(double a, double b, int c) : lifeform(a, b, c) {}
algue::algue(){};
corail::corail(){};
int corail::indice_id = 0;
int *corail::tab_id = new int[5];
corail::corail(double x, double y, int a, int b, int c, int d, int e, int f) : lifeform(x, y, a)
{
    id = b;
    tab_id[indice_id] = id;
    indice_id++;
    segment_nbre = f;
    segments = new Segment[segment_nbre];
    if (c == 0)
        sc = Status_cor::DEAD;
    if (c == 1)
        sc = Status_cor::ALIVE;
    if (d == 0)
        Dc = Dir_rot_cor::TRIGO;
    if (d == 1)
        Dc = Dir_rot_cor::INVTRIGO;
    if (e == 0)
        sd = Status_dev::EXTEND;
    if (e == 1)
        sd = Status_dev::REPRO;
}
int corail::get_segment_nbre()
{
    return segment_nbre;
}
int *corail::get_tab_id()
{
    return tab_id;
}
int corail::get_indice_id()
{
    return indice_id;
}
void corail::test_position()
{
    if (!(get_x() > 0 && get_x() < dmax && get_y() > 0 && get_y() < dmax)){
    cout << message::lifeform_computed_outside(id,get_x(), get_y()) << endl;
    exit(EXIT_FAILURE);
    }
}

int corail::get_id()
{
    return id;
}
Segment *corail::get_seg()
{
    return segments;
}
void corail::create_segment(double* AL,double* LO){

    for(int i=0;i<segment_nbre;i++){
        if(i == 0){
            
            segments[i].set_angle(AL[i]);
            segments[i].set_longueur(LO[i]);
            segments[i].set_indice(i);
            segments[i].set_base_x(pos.x);
            segments[i].set_base_y(pos.y);
            segments[i].set_base_x(segments[i].get_base_x() + segments[i].get_longueur() * cos(segments[i].get_angle()));

        }

        else {
            segments[i].set_angle(AL[i]);
            segments[i].set_longueur(LO[i]);
            segments[i].set_indice(i);
            segments[i].set_base_x(segments[i-1].get_base_x());
            segments[i].set_base_y(segments[i-1].get_base_y());
            segments[i].set_base_x(segments[i].get_base_x() + segments[i-1].get_longueur() * cos(segments[i-1].get_angle()));

        }

}}

void corail::duplicate_id()
{
    int i, k = 0;
    for (i = 0; i < indice_id; i++)
    {
        if (tab_id[i] == id)
            k++;
    }
    if (k != 0 && k != 1)
    {
        cout << message::lifeform_duplicated_id(id) << endl;
        exit(EXIT_FAILURE);
    }
}
void corail::seg_long()
{
            // cout << segments[0].get_longueur() << endl;

    for (int i = 0; i < segment_nbre; i++)
    {
        if (segments[i].get_longueur()<l_repro - l_seg_interne || segments[i].get_longueur()>=l_repro){
        cout << message::segment_length_outside(id, segments[i].get_longueur()) << endl;
        exit(EXIT_FAILURE);
        }
    }
}

void corail::seg_ang()
{
    for (int i = 0; i < segment_nbre; i++)
    {
        if (!(segments[i].get_angle() < M_PI && segments[i].get_angle() > -M_PI)){
            cout << message::segment_angle_outside(id, segments[i].get_angle()) << endl;
        exit(EXIT_FAILURE);
    }}
}
scavenger::scavenger(double x, double y, int a, double b, int c, int d) : lifeform(x, y, a)
{
    rayon = b;
    id_cor = d;
    if (c == 0)
        Sc = Status_sca::LIBRE;
    if (c == 1)
        Sc = Status_sca::MANGE;
}
scavenger::scavenger(){};
void scavenger::test_rayon()
{
    if (rayon < r_sca || rayon >= r_sca_repro){
        cout << message::scavenger_radius_outside(rayon) << endl;
    exit(EXIT_FAILURE);
    }
}
void scavenger::test_id_cor()
{
    int i, k = 0;
    corail a;
    int *t = a.get_tab_id();
    for (i = 0; i < a.get_indice_id(); i++)
    {
        if (t[i] == id_cor)
            k++;
    }
    if (k == 0){
        cout << message::lifeform_invalid_id(id_cor) << endl;
        exit(EXIT_FAILURE);
    }
}