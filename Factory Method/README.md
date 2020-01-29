## Factory Method

Defines an interface for creating an object, but lets the subclass decide which
class to instantiate.

#### Use the Factory Method pattern when:  

- a class doesn't know beforehand the exact (concrete) class of objects it's gonna create.
- a class wants its subclasses to specify the objects it creates.
- you want to provide the users of your code with a way to extend your
  project/library's internal components.
- you want to define a single point in your code where a concrete class is
  instantiated (a single source of truth). _This is a best practice always worth
  following_.

### General Structure

![General UML diagram of the Factory Method pattern][1]

#### Participants:
- **Creator**: declares a factory method which returns an object of type _Product_.
  The _Creator_ can be a class and define a _default_ implementation of the factory
  method and return some default _Concrete Product_ object, or you can make it
  abstract and force all its subclasses to implement their own factory method.  
  Note that, despite its name, the _Creator's_ primary purpose usually isn't just
  simple object creation - it usually carries some product related logic. _Factory
  Method_ pattern helps by decoupling this logic from _Concrete Product_
  creation and implementation. _Concrete Creators_ can decide which concrete implementation
  to create, and use the inherited logic on it. Clients can then communicate with
  these creators through the more abstract _Creator_ and _Product_ interfaces without
  knowing anything about the specifics of _Concrete Creators_ and _Concrete Products_.
- **ConcreteCreatorA**, **ConcreteCreatorB**: implements/overrides the base
  factory method to return an instance of the appropriate _Concrete Product_.
- **Product**: declares the interface common to all products created by the
  _Creator_ and its subclasses.
- **ConcreteProductA**, **ConcreteProductB**: implements the _Product_
  interface.

### Our Example

![Our example UML diagram][2]

- **Application** is our _Creator_ class which deals
  with document operations and also provides our abstract factory method -
  _createDocument_, which must be implemented by subclasses.  
- **HtmlApplication**, **JsonApplication** are our _Concrete Creators_ and
  provide implemented factory methods for concrete documents on top of all 
  the inherited base operations.
- **Document** provides a base _Product_ interface which all our products must
  implement.  
- **AbstractDocument** provides a base class with some common behavior, including
  constructor, and default implementations for _Product_ methods.  
- **HtmlDocument**, **JsonDocument** are our _Concrete Products_ and implement
  the _Document_ interface (by extending the _AbstractDocument_ base class).

[1]: https://i.ibb.co/1nQLs0N/Factory-Method.png
[2]: https://i.ibb.co/JrqyFbk/Factory-Method-Example.png
