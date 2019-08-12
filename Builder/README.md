## Builder

Separate the construction of a complex object from its representation (configuration)
so that the same construction process can create different representations.
Similarly to other creational patterns - the Builder pattern extracts the object 
construction code and moves it inside some other class - in this case - a 
_Builder_ class.

#### Use the Builder pattern when:
- you want to separate the algorithm for creating a complex object from the
  parts that make up the object and their assembly.
- construction process should be able to vary and allow differrent
  representations/configurations for the object that is constructed.

### General Structure

![General UML diagram of the Builder pattern][1]

#### Participants:
- **Builder**: specifies an abstract interface for product construction.
  Declares steps that are common to all builders.
- **ConcreteBuilder{1,2}**: provides different implementations of the _Builder_
  interface. Constructs and assembles a product while keeping track of the
  current product's state. Provides an interface for retrieving the product.  
  Products don't have to follow the same interface.
- **Director**: constructs the product using the _Builder_ interface. Defines
  the order in which to call the build steps.  
  _Director_ isn't strictly necessary as the _Client_ or the product itself can
  act as a _Director_.  
  However if you need to call the same build steps on the _Builder_ object in
  several places throughout your code - you should extract these series of calls 
  into separate _Director_ class.
- **Product{1,2}**: represents the object under construction. Products don't
  have to belong to an interface or same class hierarchy - in fact it can be
  a primitive - like a string (like in our example).

[1]: https://i.ibb.co/5vYf87M/Screenshot-2019-08-12-02-59-41.png
