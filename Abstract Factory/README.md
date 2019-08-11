## Abstract Factory

Provides an interface for creating families or related objects without
specifying their concrete classes. **Abstract Factory** enforces dependecies
between objects from the same family. Hence the pattern is also know as **Kit** (as in - an _object kit_).

Use the Abstract Factory pattern when:  
- you want to make you system independent of how it's products are created,
  composed and represented.
- your system needs to be configured with entire families of products at once.
- families of objects in your system are designed to be used together and you 
  want to enforce that.
- you want design a collection of products but you want to depend on concrete
  implementations.

### General Structure

![General UML diagram of the Abstract Factory pattern][1]

One of the potential downsides of this pattern is difficulty of adding new
products.  
**Abstract Factory** interface fixes the set of products that can be created.
Adding a new product means changing the Abstract Factory class and all Concrete
Factories to accommodate the new Product type.

### Our Example

![Our example UML diagram][2]

FilterFactory acts as our _Abstract Factory_. Our _Concrete Factories_ are
AllCapsFilterFactory and SmallCapsFilterFactory which both create the
appropriate implementations of _Validator_ and _Sanitizer_ which in this case
are our _Products_.  
App acts as the _Client_.

[1]: https://i.ibb.co/XjDp4NN/Screenshot-2019-08-11-20-05-59.png
[2]: https://i.ibb.co/L8Cps0g/Screenshot-2019-08-11-23-22-22.png
