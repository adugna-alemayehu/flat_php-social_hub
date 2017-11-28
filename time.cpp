#include <iostream>
using namespace std;
using std :: cout ;
#include <ctime>

int main ()
 {
 time_t currentTime ; // variable for storing t ime

 // output header
 cout « "Content -Type : text /html \n\n" ;

// output XML declarat ion and DOC TYPE
 cout « "<?xml version = \"1. 0 \" ?>"
 « "<I DOCTYPE html PUBLIC \ " - / /W3CIIDTD XHTML 1.0 n
 « " Transitional I IEN\ " \ "http://www . w3 . org/TR /xhtml1 ''
 « " /DTD/xhtml1-transi tional . dtd\">" ;
 time ( &currentTime ); // store t ime in currentTime

 // output html element and some of its contents

 cout «"<html xmlns = \ '' http : / /www.w3.org/1999/xhtml\">"
« "<head><title>Current date and time</title></head>n
 « n <body> <p> " « asct ime ( localt ime ( &currentTime ) )
 « " </p> < / body> </ html > " ;

 return 0 ;

 } // end main
