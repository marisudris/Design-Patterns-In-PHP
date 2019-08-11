## Factory Method

Defines an interface for creating an object, but lets the subclass decide which
class to instantiate.

Use the Factory Method pattern when:  
- a _class_ doesn't know beforehand the class of objects it's gonna create
- a class wants its subclasses to specify the objects it creates
- you want to provide the users of your code with a way to extend you
  project/library's internal components
- you want to define a single point in your code where a concrete class is
  instantiated (a single source of truth). _This is a best practice always worth
  following_.

### General Structure

![General UML diagram of the Factory Method pattern][1]

Keep in mind that the Creator's primary purpose is not creating Products.
Quite often it will contain it's own business logic that simply relies on 
Product objects created by it. Subclasses can change that logic by changing the
Product type they create and operate on.

[1]: https://i.ibb.co/1nQLs0N/Factory-Method.png
