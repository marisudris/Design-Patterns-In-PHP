## Builder

Separates the construction process of a complex object from its final
representation (configuration), so that the same construction process can
create different representations. _Imagine you're building a house - you
can create a wooden house, a brick house etc. - aka - different representations
of the same basic object using the same building process._
Similarly to other creational patterns, the Builder pattern extracts object 
construction code and moves it inside some other class, in this case - a 
_Builder_ class.  
Object creation is organized into a series of steps - this is how Builder pattern differs
from all the other creational patterns - object creation is more granular.

#### Use the Builder pattern when:

- you want to separate out the algorithm for creating a complex object from the
  parts and implementation that makes up and uses the object.
- construction process needs vary and allow differrent representations
  for the same type of object.
- construction process, i.e., the building steps are very similar for different
  types of objects and you want to unify the builder classes under the same interface.
- you find yourself having a product constructor that has too many optional
  parameters for all the numerous options it can have. In this situation it's 
  best to delegate the object construction and assembly to a separate _Builder_ class.
- you find yourself defining numerous subclasses just to accommodate all the
  possible variations for the same type of product. Adding a new feature will require
  growing and bloating your class hierarchy even more.

### General Structure

![General UML diagram of the Builder pattern][1]

#### Participants:

- **Builder**: specifies an abstract interface for product construction.
  Declares steps that are common to all builders. It's best to introduce
  _Builder_ only when your objects (products) are quite complex and may require
  complex configuration. Use other creational patterns if this is not the
  case.
- **ConcreteBuilder1**, **ConcreteBuilder2**: provides different implementations
  of the _Builder_ interface and creates different types of products. Constructs
  and assembles a product while keeping track of the current product's state.
  Provides an interface for retrieving the product.  
  Products don't have to follow the same interface or class hierarchy - hence the product
  retrieval is not defined in the _Builder_ interface itself, it doesn't know
  what types of products will be built by it. For these reasons the _Client_ itself will
  usually fetch the created product directly from the _ConcreteBuilder_ after it's
  finished building. Since PHP has dynamic typing - you _can_ define a product
  retrieval method in the _Builder_ interface, just don't use a return type hint.
- **Director**: constructs the product using the _Builder_ interface. Defines
  a fixed order in which to call the build steps.  
  _Director_ isn't strictly necessary as the _Client_ or the product itself can
  act as a _Director_.  
  However if you need to call the same build steps on the _Builder_ object in
  several places throughout your code - it's better to extract these series of calls 
  into a separate _Director_ class.
  The constructed product can be fetched directly from the director **only if** all 
  products implement the same interface.  
  _Concrete Builders_ vary the type of product that's created, _Directors_ vary
  the creation steps that a used to create a product.
- **Product1**, **Product2**: represents the object under construction. Products don't
  have to belong to an interface or same class hierarchy - in fact it can be
  a primitive - like a string (just like in our example).

### Our Example

![Our example UML diagram][2]

- **QueryBuilder** provides our _Builder_ interface.  
- **MySqlQueryBuilder** is our _ConcreteBuilder_ and implements the _Builder_
  interface. Our _Product_ in this case is a simple SQL query string that the MySqlQueryBuilder
  constructs step by step.
- **App** class here acts both as a _Client_ and a _Director_. It composes
  the _QueryBuilder_ and uses it to construct queries. We don't need a _Director_
  because query string building is a highly variable process - there are endless
  options of how to build one in an app and this is why the _Client_ uses the _ConcreteBuilder_ directly.  
  Some simple types of SELECT, UPDATE, DELETE statement are common and we _could've_ used
  a _Director_ for those, but it's fairly trivial for a _Client_ to call these steps directly on the
  _ConcreteBuilder_, a _Director_ would introduce unnecessary complexity.

[1]: https://i.ibb.co/5vYf87M/Screenshot-2019-08-12-02-59-41.png
[2]: https://i.ibb.co/BNdqm3G/Builder-Example.png
