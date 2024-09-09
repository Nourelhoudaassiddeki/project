#include "shape.h"


double Segment::getangle() {
    return angle;
}

int Segment::get_index() {
    return index;
}

double ecartangulaire(Segment &A, Segment &B) {
    s2d vecA = {A.get_extr_x() - A.get_base_x(), A.get_extr_x() - A.get_base_y()};
    s2d vecB = {B.get_extr_x() - B.get_base_x(), B.get_extr_x() - B.get_base_y()};

    double dotProduct = vecA.x * vecB.x + vecA.y * vecB.y;
    double magA = sqrt(vecA.x * vecA.x + vecA.y * vecA.y);
    double magB = sqrt(vecB.x * vecB.x + vecB.y * vecB.y);

    double cosAngle = dotProduct / (magA * magB);
    double angle = acos(cosAngle);

    return angle;
}


void superposition(int id, Segment A, Segment B)
{
	if (ecartangulaire(A, B) <= epsil_zero)
	{
		cout << message::segment_superposition(id, A.get_index(), B.get_index()) << endl;
		exit(EXIT_FAILURE);
	}
}


int orientation(s2d p, s2d q, s2d r) {
    double val = (q.y - p.y) * (r.x - q.x) - (q.x - p.x) * (r.y - q.y);
    double norme = sqrt(pow(q.x - p.x, 2) + pow(q.y - p.y, 2));

    val = val / norme;

    if (val <= epsil_zero) return 0;
    return val;
}

bool onSegment(s2d p1, s2d p2, s2d q) {
    s2d pr = {p2.x - p1.x, p2.y - p1.y};
    s2d pq = {q.x - p1.x, q.y - p1.y};
    double p_s = pr.x * pr.x + pr.y * pr.y;
    double pq_nor = pq.x * pr.x + pq.y * pr.y;
    double x = pq_nor / p_s;

    return (x >= -epsilon && x <= p_s + epsilon);
}

bool Intersect(s2d p1, s2d q1, s2d p2, s2d q2) {
    int o1 = orientation(p1, q1, p2);
    int o2 = orientation(p1, q1, q2);
    int o3 = orientation(p2, q2, p1);
    int o4 = orientation(p2, q2, q1);

    if (o1 != o2 && o3 != o4)
        return true;

    if (o1 == 0 && onSegment(p1, p2, q1)) return true;
    if (o2 == 0 && onSegment(p1, q2, q1)) return true;
    if (o3 == 0 && onSegment(p2, p1, q2)) return true;
    if (o4 == 0 && onSegment(p2, q1, q2)) return true;

    return false;
}
void inter_is_exist(Segment A, Segment B, int id1,int id2) {
    if (Intersect(A.base, B.base, A.extr, B.extr) == true) {
        cout << message::segment_collision(id1, A.index, id2, B.index) << endl;
        exit(EXIT_FAILURE);
    }
}



double Segment::get_base_x()
{
    return base.x;
}
Segment::Segment(){};

double Segment::get_base_y()
{
    return base.y;
}

double Segment::get_extr_x()
{
    return extr.x;
}
double Segment::get_extr_y()
{
    return extr.y;
}
double Segment::get_angle()
{
    return angle;
}
double Segment::get_longueur()
{
    return longueur;
}
void Segment::set_indice(int i){
    index = ++i;
}
void Segment::set_base_x(double x){
    base.x = x;
}
void Segment::set_base_y(double y){
    base.y = y;
}

void Segment::set_angle(double a){
    angle = a;
}
void Segment::set_longueur(double l){
    longueur = l;
}
s2d Segment::get_base() { return base; };
s2d Segment::get_extr() { return extr; };

void Segment::extremite(){
			extr.x= base.x + longueur * cos (angle);
			extr.y= base.y +  longueur * sin(angle);
		}
