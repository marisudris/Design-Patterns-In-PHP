## Abstract Factory

Provides an interface for creating families or related objects without
specifying their concrete classes. **Abstract Factory** enforces dependecies
between objects from the same family. Hence the pattern is also know as **Kit** (as in - an _object kit_).

Use the Abstract Factory pattern when:  
- you want to make you system independent of how it's products are created,
  composed and represented.
- your system needs to be configured with entire families of products at once.
- families of objects in your system are designed to be used together and you 
  want to enforce this constraint.
- you want design a collection of products but you don't want to depend on concrete
  implementations.

### General Structure

![General UML diagram of the Abstract Factory pattern][1]

One of the potential downsides of this pattern is the difficulty of adding new
products.  
**Abstract Factory** interface fixes the set of products that can be created.
Adding a new product means changing the Abstract Factory class and all Concrete
Factories to accommodate the new Product type.  
Hence you should note that _Abstract Factory_ pattern makes it easy to add a new
_Concrete Product_ of an existing type, while it makes it hard to introduce a new
type of _Abstract Product_.  
**ConcreteFactory1**, **ConcreteFactory2** are _Concrete Factories_ - they implement the
creation methods defined in the _Abstract Factory_ interface. Each _Concrete
Factory_ corresponds to and creates a specific variant of our _Abstract Products_.  
**ProductA**, **ProductB** are _Abstract Products_ - they declare
an interface for each _Abstract Product_ in our system. All _Abstract Products_ make up a product
family - distinct versions of these product families can be implemented using
_Concrete Products_ and later created by a specific _Concrete Factory_.  
**ConcreteProductA1**, **ConcreteProductA2**, **ConcreteProductB1**, **ConcreteProductB2** are
_Concrete Products_. They provide various implementations for our _Abstract Products_. They are all
grouped by their respective variants - _ConcreteProductA1_, _ConcreteProductB1_
make up a single variant/product family, just like _ConcreteProductA2_ and
_ConcreteProductB2_ make up their own distinct family. These families are then
created by their respective _Concrete Factory_.  
Each _Abstract Product_ must be implemented in all given variants that exist in the
system.

### Our Example

![Our example UML diagram][2]

**FilterFactory** acts as our _Abstract Factory_.
**AllCapsFilterFactory** and **SmallCapsFilterFactory** are our _Concrete
Factories_ which both create the appropriate implementations of **Validator**
and **Sanitizer** which are our _Abstract Products_.  
**SmallCapsValidator** and **SmallCapsSanitizer** together make up a specific family of
_Concrete Products_ (which are created the **SmallCapsFilterFactory**).  
Similarly - **AllCapsValidator** and **AllCapsSanitizer** together make up
another family of _Concrete Products_ which are created by a different
_Concrete Factory_ - **AllCapsFilterFactory**.  
**App** acts as the _Client_ which uses our factories and products - but only
through their interfaces, therefore following the SOLID principle of depending
on abstractions not concretions.

[1]: https://i.ibb.co/XjDp4NN/Screenshot-2019-08-11-20-05-59.png
[2]: https://i.ibb.co/L8Cps0g/Screenshot-2019-08-11-23-22-22.png
