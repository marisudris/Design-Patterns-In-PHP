## Factory Method

Defines an interface for creating an object, but lets the subclass decide which
class to instantiate.

####Use the Factory Method pattern when:  
- a _class_ doesn't know beforehand the exact (concrete) class of objects it's gonna create.
- a class wants its subclasses to specify the objects it creates.
- you want to provide the users of your code with a way to extend you
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
  abstract and force all subclasses to implement their own factory method.  
  Note that, despite its name, the _Creator's_ primary purpose usually isn't
  simple object creation - it usually carries some product related logic. _Factory
  Method_ patttern helps to decouple this logic from concrete product class
  implementations. _Concrete Creators_ can decide on those and use the logic on
  them. Clients can then communicate to these creators through the more abstract
  _Creator_ interface without knowing anything about these _Concrete Products_.
- **ConcreteCreatorA**, **ConcreteCreatorB**: implements/overrides the base
  factory method to return a _Concrete Product_ instance.
- **Product**: declares the interface common to all products created by the
  _Creator_ and its subclasses.
- **ConcreteProductA**, **ConcreteProductB**: implements the _Product_
  interface.

[1]: https://i.ibb.co/1nQLs0N/Factory-Method.png
[2]: ...
