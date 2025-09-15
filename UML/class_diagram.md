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
- decimal rotation_speed
- decimal radius
- decimal distance_from_primary_object
- f_key_star_system star_system_id
}



