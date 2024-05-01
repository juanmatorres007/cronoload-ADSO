#include <iostream>
using namespace std;

int main() {
    int cantidadZapatos;
    double costoCompra, precioVenta;
    int refeza;
    string des, tallaz, dis;

    cout << "Administrar venta de zapatos" << endl;

    cout << "Digite la referencia del zapato: ";
    cin >> refeza;

    cout << "Digite la descripcion del zapato: ";
    cin >> des;

    cout << "Digite la talla del zapato: ";
    cin >> tallaz;

    cout << "Digite la disponibilidad del zapato: (S/N)";
    cin >> dis;

    cout << "Ingrese la cantidad de zapatos: ";
    cin >> cantidadZapatos;

    cout << "Ingrese el costo de compra por unidad de zapato: ";
    cin >> costoCompra;

    // Calcular el costo total
    double costoTotal = costoCompra * cantidadZapatos;

    cout << "Ingrese el precio de venta por unidad de zapato: ";
    cin >> precioVenta;

    // Calcular el precio total
    double precioTotal = precioVenta * cantidadZapatos;

    double gananciaPorUnidad = precioVenta - costoCompra;
    
    // Calcular la ganancia total
    double gananciaTotal = gananciaPorUnidad * cantidadZapatos;

    // Calcular el porcentaje de utilidad total
    double porcentajeUtilidadTotal = (gananciaTotal / costoTotal) * 100;

    cout << "\nLos datos ingresados son:\n";
    cout << "Refrencia: " << refeza << endl;
    cout << "Descripcion: " << des << endl;
    cout << "Talla: " << tallaz << endl;
    cout << "Desponibilidad: " << dis << endl;
    cout << "Cantidad: " << cantidadZapatos << endl;
    cout << "Costo por unidad: " << costoCompra << endl;
    cout << "Costo total: " << costoTotal << endl;
    cout << "Precio por unidad: " << precioVenta << endl;
    cout << "Precio total: " << precioTotal << endl;
    cout << "Ganancia por unidad: " << gananciaPorUnidad << endl;
    cout << "Ganancia total: " << gananciaTotal << endl;
    cout << "Porcentaje de utilidad total: " << porcentajeUtilidadTotal << "%" << endl;
    cout << "Desarrollado por Esteban Cordoba Calderon";

    return 0;
}

