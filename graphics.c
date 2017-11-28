#include<graphics>
#include<stdlib.h>
#include<stdio.h>
#include<conio.h>
using namespace std;
int main(void){
int gdrive=DETECT,gmode;
initgraph(&gdrive,&gmode,DETECT);
error_code=graphresult();
if(error_code!= gr0k){
    printf("hellow");
    getch();
    exit(1);
}
line(0,0,getmaxx(),getmaxy());
getch();
closegraph();
return 0;
}
