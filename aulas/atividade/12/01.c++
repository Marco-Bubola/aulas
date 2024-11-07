#include <stdio.h>
float calcula(float raio)
{
  float area = 3.14 * (raio * raio);
  return area;
}

int main()
{
  float area, raio;
  printf("Digite o Raio da circunferencia: ");
  scanf("%f", &raio);
  area = calcula(raio);
  printf("\nA area e: %.2f", area);
}