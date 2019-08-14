## Decorator

Attach extra functionality dynamically - using composition. Decorators provide
a flexible alternative over inheritance and subclassing which hardcodes the
relationships between classes. Composition allows you to add new
responsibilities to individual objects rather than an entire class.
Also known as **Wrapper**.

#### Use the Composite pattern when:
- you want to add responsibilities to individual objects dynamically and in transparent
  fashion, without affecting other objects - in particular the ones that
  consume the (now decorated) object.
- you want to add responsibilities that can be withdrawn.
- subclassing is impractical and would make your code messy. Subclassing for a large 
  number of extensions could produce an explosion of subclasses in order to provide 
  every combination of the extra behavior.

### General Structure

![General UML diagram of the Decorator pattern][1]

#### Participants:
- **Component**: defines the common interface for wrappers and wrapped objects 
  that can have responsibilities added to them dynamically.
- **ConcreteComponent**: an object that defines basic behavior and can be
  wrapped and altered by decorators.
- **BaseDecorator**: maintains a reference to the _Component_ object and
  delegates all operations to the wrapped object. It refers to the _Component_
  because it makes it possible for the decorator to wrap both the concrete
  components and decorators.
- **ConcreteDecorator{A,B}**: adds responsibilities to the _Component_.
  Overrides _BaseDecorator_ methods and executes their modified behavior before
  or after calling the parent method.

### Our Example

![Our example UML diagram][2]

**TextWriterInterface** acts as the _Component_ and provides a method all the
components must implement. **TextWriter** is our _ConcreteComponent_ that
provides a primitive behavior (in our case - returns a simple _"Hello world"_
string). **TextDecorator** is our _BaseDecorator_ class. It wraps
a _Component_ and delegates to it. **TextCapitalizer**, **TextLowercaser** and
**TextPunctuationRemover** are our _ConcreteDecorators_ that respectively
capitalize, lowercase and remove punctuation from the text they're outputting.
These can compose each other in any order (although capitalizing and
lowercasing the text in a single operation isn't that usefult). If there's
a need new functionality - a new _ConcreteDecorator_ class can be easily
written.

[1]: https://i.ibb.co/12cNg0Z/Screenshot-2019-08-14-03-47-55.png
[2]: https://i.ibb.co/thgk7JR/Screenshot-2019-08-14-04-03-03.png
