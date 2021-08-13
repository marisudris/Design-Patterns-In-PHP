# GoF Design Patterns in PHP

A little learning repo I've created for myself, exploring a couple of patterns from the [Design Patterns: Elements of Reusable Object-Oriented Software ](https://en.wikipedia.org/wiki/Design_Patterns)  that could be relevant for PHP (with some examples).

A **design pattern** is a proven technique which helps solve a recurring problem in software design.
Each design pattern helps maximize code reuse and lets some aspect of system vary independently of other aspects, thereby making the system more robust to a particular type of change and facilitating other good coding principles, like **[SOLID](https://blog.cleancoder.com/uncle-bob/2020/10/18/Solid-Relevance.html)**.

Design patterns are classified into 3 distinct categories:

- **[Creational Patterns](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Creational%20Patterns)** - provide flexible object creation mechanisms.
- **[Structural Patterns](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Structural%20Patterns)** - assemble objects into flexible structures.
- **[Behavioral Patterns](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Behavioral%20Patterns)** - ensure flexible communication and proper responsibility allocation among objects.



Some of the patterns I've explored here - and *aspects* that can vary freely without introducing breaking changes in the system.

**Creational Patterns**:

- **[Abstract Factory](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Creational%20Patterns/Abstract%20Factory)** - families of objects
- **[Factory Method](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Creational%20Patterns/Factory%20Method)** - subclass of an object that is instantiated
- **[Builder](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Creational%20Patterns/Builder)** - how a composite object gets created

**Structural Patterns**:

- **[Adapter](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Structural%20Patterns/Adapter)** - instance of an object
- **[Decorator](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Structural%20Patterns/Decorator)** - responsibilities of an object, without subclassing it
- **[Composite](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Structural%20Patterns/Composite)** - structure and composition of an object
- **[Facade](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Structural%20Patterns/Facade)** - interface to a subsystem
- **[Bridge](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Structural%20Patterns/Bridge)** - implementation of an object

**Behavioral Patterns**:

- **[Strategy](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Behavioral%20Patterns/Strategy)** - the exact algorithm used
- **[State](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Behavioral%20Patterns/State)** - state of an object
- **[Observer](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Behavioral%20Patterns/Observer)** - number of objects that depend on an other object (*subject*), and how those dependent object stay up to date with the subject
- **[Command](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Behavioral%20Patterns/Command)** - when and how a request is fulfilled
- **[Template Method](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Behavioral%20Patterns/Template%20Method)** - steps of an algorithm
- **[Iterator](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Behavioral%20Patterns/Iterator)** - how an aggregate object's elements are accessed/traversed
- **[Chain of Responsibility](https://github.com/marisudris/Design-Patterns-In-PHP/tree/master/Behavioral%20Patterns/Chain%20of%20Responsibility)** - which object fulfills the request

