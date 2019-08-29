## Template Method

Defines a skeleton of an algorithm in the superclass and defers some steps to
subclasses. Subclasses can override/redefine some steps of the algorithm
without without changing its structure

#### Use the Template Method pattern when:
- you have invariant (unchanging) parts in your algorithm that can be factorized
  in a seperate class (_refactoring to generalize_) and varying parts that can be defined by 
  subclasses.
- you want to control how your class is extended. You can define and split out individual
  steps of the algorithm and allow only certain primitive operations and _hooks_ to be 
  overridden/redefined.

### General Structure

![UML diagram of the Template Method pattern][1]

#### Participants:
- **AbstractClass**: defines a set of _primitive operations_ that act as individual steps of
  the algorithm. And defines the _template method_ defines the skeleton of the
  algorithm and calls these methods in a certain order. These individual steps
  may be declared as abstract (in our diagram - _primitiveOperation2_ and
  _primitiveOperation3_) or have some default implementation (in our diagram -
  _primitiveOperation1_.
- **ConcreteClass{A,B}**: implements or/and overriddes the _primitive operations_, but **not**
  the _template method_ itself.

### Our Example

![Our example UML diagram][2]

**AbstractView** is our _AbstractClass_ it defines a simple _render_ method
which uses two other _primitive_ methods: _sanitizeData_ which, as name implies,
sanitizes raw data for the HTML output. It's a default implementation, however
it can be overridden if the developer wants to use some other sanitization strategy.
The other one - _generateMarkup_ is an abstract method that **must** be
implemented by the subclasses.
This class also holds references for _rawData_ and _sanitizedData_ arrays of
strings. We might have a need for raw unsanitized data in some cases.  
**DivView, UnorderedListView** are out _ConcreteClasses_. They provide
a different implementation for the _generateMarkup_ method. Each one generates
a different HTML markup, by using different HTML tags. We probably wouldn't
create a class for each HTML tag variant in a real life project, but for the sake of simplicity
I've decided to go with these.

[1]: https://i.ibb.co/XfP6F7z/Template-Method.png
[2]: https://i.ibb.co/YPTNftD/Template-Method-Example.png 
