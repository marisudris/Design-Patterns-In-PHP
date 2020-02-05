## Template Method

Defines a skeleton of an algorithm and defers the implementation of its steps to
the subclasses. Subclasses can override/redefine some steps of the algorithm
without changing its structure.

#### Use the Template Method pattern when:

- you have invariant (unchanging) parts in your algorithm that can be refactorized
  in a seperate class (_refactoring to generalize_) and varying parts that can be
  defined in subclasses.
- you want to control how your class is extended. You can define and split out
  individual steps of the algorithm and allow only certain primitive operations
  and _hooks_ to be overridden/redefined.

### General Structure

![UML diagram of the Template Method pattern][1]

#### Participants:

- **AbstractClass**: defines a set of _primitive operations_ that act as individual
  steps for the algorithm. Defines the _template method_ - the skeleton of the
  algorith, where it calls these operations in a certain order. These individual
  steps may be declared as abstract (in our diagram - _primitiveOperation2_ and
  _primitiveOperation3_) or have s default implementation (in our diagram -
  _primitiveOperation1_.
- **ConcreteClassA**, **ConcreteClassB**: implements and/or overriddes the
  _primitive operations_, but **not** the _template method_ itself.

### Our Example

![Our example UML diagram][2]

- **AbstractView** is our _AbstractClass_. It defines a simple _render_ method
  which uses two other _primitive_ methods: _sanitizeData_ which, as the name
  implies, sanitizes raw data for the HTML output. It's the default implementation,
  however, it can be overridden if the developer wants to use some other sanitization
  strategies.  
  The other one - _generateMarkup_ is an abstract method that **must** be
  implemented in the subclasses. This class also holds references for _rawData_
  and _sanitizedData_ arrays of strings. We might have a need for raw unsanitized
  data in some cases.  
- **DivView, UnorderedListView** are our _ConcreteClasses_. They provide
  different implementations for the _generateMarkup_ method. Each one generates
  a different HTML markup, by using different HTML tags. We probably wouldn't
  create a class for each HTML tag variant in a real life project, but for the
  sake of simplicity of this example I've decided to go with these.

[1]: https://i.ibb.co/XfP6F7z/Template-Method.png
[2]: https://i.ibb.co/YPTNftD/Template-Method-Example.png 
