#ifndef SIMULATION_H
#define SIMULATION_H
#include <fstream>
class Simulation {
public:
    void readFile( std::ifstream&);
private:
    int nombre_alg,nombre_cor,nombre_sca;
};
#endif