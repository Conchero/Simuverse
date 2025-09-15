```mermaid

---
title: CImple Class Diagram
---

classDiagram

class star_system{
- int id
- string name
}

class body{
- int id 
- string name
- decimal mass
- decimal rotationSpeed
- decimal radius
- f_key_star_system star_system_id
}



