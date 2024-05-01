#include <iostream>
using namespace std;

int main() {
    double costoCompra, precioVenta;
    int refeza;
    string des,tallaz,dis;
    cout << "Administrar venta de zapatos" << endl;
    
	cout << "Digite la referencia del zapato: ";
    cin >> refeza;
    
    cout << "Digite la descripcion del zapato: ";
    cin >> des;
    
    cout << "Digite la talla del zapato: ";
    cin >> tallaz;
    
    cout << "Digite la disponibilidad del zapato: (S/N)";
    cin >> dis;
    
    cout << "Ingrese el costo de compra por par de zapatos: ";
    cin >> costoCompra;

    cout << "Ingrese el precio de venta por par de zapatos: ";
    cin >> precioVenta;

	double ganancia = precioVenta - costoCompra;

    cout << "\nLos datos ingresados son:\n";
    cout << "Refrencia: " << refeza << endl;
	cout << "Descripcion: " << des << endl;
	cout << "Talla: " << tallaz << endl;
	cout << "Desponibilidad: " << dis << endl;
	cout << "Costo: " << costoCompra << endl;
	cout << "Precio: " << precioVenta << endl;
	cout << "Ganancia: " << ganancia << endl;
	cout << "Desarrollado por Esteban Cordoba Calderon";

    return 0;
}
