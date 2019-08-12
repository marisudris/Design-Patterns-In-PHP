## Builder

Separate the construction of a complex object from its representation (configuration)
so that the same construction process can create different representations.
Similarly to other creational patterns - the Builder pattern extracts the object 
construction code and moves it inside some other class - in this case - a 
_Builder_ class.

#### Use the Builder pattern when:
- you want to separate the algorithm for creating a complex object from the
  parts that make up the object and their assembly.
- construction process should vary and allow differrent
  representations/configurations for the object that is constructed.
- you find yourself having a product constructor that has too many optional
  parameters for all the numerous options it can have. In this situation it's 
  best to delegate the product construction to a separate _Builder_ class.

### General Structure

![General UML diagram of the Builder pattern][1]

#### Participants:
- **Builder**: specifies an abstract interface for product construction.
  Declares steps that are common to all builders.
- **ConcreteBuilder{1,2}**: provides different implementations of the _Builder_
  interface. Constructs and assembles a product while keeping track of the
  current product's state. Provides an interface for retrieving the product.  
  Products don't have to follow the same interface - hence the product
  retrieval is not defined in the _Builder_ interface, since it doesn't know
  what types of products will be built. For similar reasons the _Client_ will
  usually fetch the created product directly from the _ConcreteBuilder_ after it's
  finished.
- **Director**: constructs the product using the _Builder_ interface. Defines
  the order in which to call the build steps.  
  _Director_ isn't strictly necessary as the _Client_ or the product itself can
  act as a _Director_.  
  However if you need to call the same build steps on the _Builder_ object in
  several places throughout your code - you should extract these series of calls 
  into separate _Director_ class.
  The constructed product can be fetched directly from the director **only if** all 
  products implement the same interface.
- **Product{1,2}**: represents the object under construction. Products don't
  have to belong to an interface or same class hierarchy - in fact it can be
  a primitive - like a string (like in our example).

### Our Example

![Our example UML diagram][2]

In our example the **QueryBuilder** provides our _Builder_ interface.  
**MySqlQueryBuilder** is our _ConcreteBuilder_ and implements the _Builder_
interface. Our _Product_ is a simple SQL query string that the QueryBuilder
constructs.
The **App** class here acts both as our _Client_ and _Director_. It composes
the QueryBuilder and uses it to construct queries. It's fairly common to not
use a separate _Director_ class or classes and simply use the _ConcreteBuilder_
directly.

[1]: https://i.ibb.co/5vYf87M/Screenshot-2019-08-12-02-59-41.png
[2]: https://i.ibb.co/BNdqm3G/Builder-Example.png
