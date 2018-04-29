# ProGnosiX

Sa se implementeze o aplicatie Web pentru realizarea de prognoze privitoare la punctajele obtinute de studenti la probele de 
evaluare -- teste scrise, activitati de laborator, proiecte etc. -- a cunostintelor la anumite discipline (e.g., Ingineria programarii,
Practica SGBD, Tehnologii Web). Pentru fiecare runda a prognozelor, un utilizator (eventual, autentificat) va putea "ghici" doar 
o singura data nota pe care o va lua. In cazul in care nota precizata de acesta va coincide cu cea reala (preluata dintr-un document 
CSV, JSON sau XML separat), va primi P unitati in plus la punctaj, in caz contrar va obtine M unitati in minus. Dupa un numar de R runde,
se vor putea afisa punctajele finale ale tuturor celor evaluati. Schimbarile de situatie vor fi disponibile via un flux RSS. 
Situatiile cu punctaje vor fi disponibile, de asemenea, ca documente adoptand formatele CSV si PDF.
