#include <iostream>
#include "simulation.h"
#include "shape.h"
#include "lifeform.h"
#include<fstream>
void Simulation::readFile(ifstream& f){
    double x,y,x1,y1;
    int age,age1;
    int nombre_seg;
    int age2;
    double x2,y2;

f >> nombre_alg;
 algue *alg = new algue[nombre_alg];
    for( int j=0;j<nombre_alg;j++){
        f >> x >> y >>age;
        algue b(x,y,age);
        alg[j]=b;
    }
   f >> nombre_cor;
corail *cor= new corail[nombre_cor];
int id;
 int statut_cor,rotation_cor,dev_statut;
    for( int k=0;k<nombre_cor;k++){
        f >> x1 >> y1 >> age1 >> id >> statut_cor >> rotation_cor >> dev_statut >>nombre_seg;
        corail c(x1,y1,age1,id,statut_cor,rotation_cor,dev_statut,nombre_seg);

            double *a=new double[nombre_seg];
            double *l=new double[nombre_seg];
            for(int n=0;n<nombre_seg;n++){
                     f >> a[n];
                     f >> l[n];

            }
            c.create_segment(a,l);
        cor[k]=c;
    }

int nombre_scav;
  f >> nombre_scav;
scavenger *scav= new scavenger[nombre_scav];
int id_;
int statut_scav;
double rayon_scav;
    for( int i=0;i<nombre_scav;i++){
        f >> x2 >> y2 >> age2 >> rayon_scav >>statut_scav >> id_;
        scavenger d(x2,y2,age2,rayon_scav,statut_scav,id_);
        scav[i]=d;
    }
    
    for(int j=0;j<nombre_alg;j++){
        alg[j].test_age();
        alg[j].test_position();
    }
    for(int k=0;k<nombre_cor;k++)
    {
        cor[k].test_age();
        cor[k].test_position();
        cor[k].duplicate_id();
        cor[k].seg_long();
        cor[k].seg_ang();

        Segment *s = cor[k].get_seg();
        for (int m = 0; m < cor[k].get_segment_nbre() ; m++)
        {
            superposition(cor[k].get_id(),s[m],s[m + 1]);
        }
        for (int j = 0; j < cor[k].get_segment_nbre(); j++)
        {
            for (int f = 0;  f< nombre_cor; f++)
            {
                Segment *se = cor[f].get_seg();
                for (int n = 0; n < cor[f].get_segment_nbre(); n++)
                {
                    if (cor[k].get_id() != cor[f].get_id() || s[j].get_index() != se[n].get_index())
                        inter_is_exist(s[j], s[n],cor[k].get_id(), cor[f].get_id());
                }
            }
        }
    }
    for(int i=0;i<nombre_scav;i++){
        scav[i].test_age();
        scav[i].test_position();
        scav[i].test_rayon();
        scav[i].test_id_cor();
    }

    cout << message::success()<<endl;
}
