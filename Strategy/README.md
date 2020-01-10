## Strategy

Defines a family of algorithms, encapsulates each one, and make them
interchangeable. Strategy pattern lets the algorithm vary independently from the
clients that use it.  
Also known as **Policy**.

#### Use the Strategy pattern when:

- many related classes in you system differ only in their behavior. You can
  extract the varying behavior into a seperate class hierarchy and reduce all
  the original classes into a single abstract one.
- you want different variants of an algorithm within an object and be able to
  switch between them at runtime.
- you find yourself tangled in a massive conditional that lets you vary the
  behavior. This is a violation of the _Open/Closed principle_. Adding a new
  algorithm would mean changing the class and perhaps adding yet another
  condition. With _Strategy_ you don't need to change an existing class - only
  add a new _ConcreteStrategy_ class.

### General Structure

![UML diagram of the Strategy pattern][1]

#### Participants:
- **Strategy**: declares an interface common to all algorithms(_ConcreteStrategies_).
  Context uses this interface to call on algorithms defined in _ConcreteStrategies_. 
- **ConcreteStrategy**: implements a variant of the algorithm behind _Strategy_
  interface.
- **Context**: is configured with and uses a _ConcreteStrategy_ object via
  the _Strategy_ interface.
- **Client**: creates a specific _ConcreteStrategy_ object and passes it to
  the _Context_ - either via constructor if the _Context_ needs one to
  function - or setter if the _Context_ doesn't necessarily need one (perhaps
  it defines a default behavior) and if you want to change the strategy
  during runtime. _Context_ can have both - it depends of your specific needs
  for the project.

### Our Example

![Our example UML diagram][2]

- **TextHandler** is our _Context_. If it's given a _WriterStrategy_ type -
  it delegates to it. Otherwise it simply returns the raw data it receives as
  its default behavior.   
- **WriterStrategy** is our _Strategy_ interface. It defines a single _write_
  method that all the writers must implement.  
- **JsonWriter, HtmlWriter** are our _ConcreteStrategies_. They write out the
  text using different writing strategies - the latter writes out the text as
  HTML while the former - as a JSON string.  
- **App** acts as the _Client_. It configures the _TextHandler_ with the
  appropriate _WriterStrategy_ and uses it in its application logic.

[1]: https://i.ibb.co/d0fddPd/Strategy.png
[2]: https://i.ibb.co/2htJDw6/Strategy-Example.png 
