## Bridge

Decouples abstractions from their implementations into seperate hierarchies so 
that they can vary independently from each other.  
Also known as: **Handle/Body**.

#### Use the Bridge pattern when:

- you want to avoid permament binding between abstraction and its
  implementation.
- you want to extend class into several independent dimensions/concepts in order to
  avoid having to make a class for every combination of every member of every
  dimension.  
  _Ex._: A front-end and its back-end API - both can vary independently if you
  use the _Bridge_ pattern.  
  These independent concepts could be: front-end/back-end,
  domain/infrastructure, interface/implementation, abstraction/platform...
- changes in the implementation shouldn't have any effect on the abstraction
  and vice-versa.
- you want to switch implementation at run-time. Since _Bridge_ pattern, like
  many other structural pattern, uses composition - it can be injected with any
  other implementation object as long as it conforms to the _Implementor_
  interface.

### General Structure

![UML diagram of the Bridge pattern][1]

#### Participants:

- **Abstraction**: defines the abstraction's interface (doesn't have to be a
  literal interface). Provides high-level logic and uses the _Implementor_
  that does the actual low-level work.
- **RefinedAbstraction**: extends the interface defined by _Abstraction_ and
  provides variants of control logic. Like their _Abstraction_ parent - works
  with different implementations via their _Implementor_ interface. 
- **Implementor**: defines the interface common to all _ConcreteImplementors_.
  _Abstractions_ access implementation via this interface. Typically the
  _Implementor_ provides lower-level primitive operations that are used by the
  _Abstraction_ to declare more complex behaviors.
- **ConcreteImplementor**: implements the _Implementor_ interface and provides
  specific code for a specific implementation.
- **Client**: uses only _Abstraction_, but has to link _Abstraction_ with an
  appropriate _Implementor_, perhaps through some bootstrapping code or during
  its own runtime if it's provided a capability to switch _Implementors_ during
  the execution.

### Our Example

![Our example UML diagram][2]

- **AbstractPage** acts as the _Abstraction_. In this example it's an abstract class 
  and defines a method for switching renderer, and defines an abstract _renderer_
  method that its sublasses must implement. It _must_ be subclassed - we can't use
  the _AbstractPage_ itself directly.
- **RendererInterface** is our _Implementor_. It defines the interface for all
  the implementors in its hierarchy through which our _Abstractions_ will
  access them.
- **ProfilePage, TimelinePage** - our _RefinedAbstraction_ classes. Both implement
  the _renderer_ method by using _Implementor_ methods in various ways.
- **HtmlRenderer, XmlRenderer** - our _ConcreteImplementor_ classes - both of
  them define a specific renderer type that's used by our pages.
- **App** acts as our _Client_.

[1]: https://i.ibb.co/RC7m6tN/Bridge.png
[2]: https://i.ibb.co/PGcgB2g/Screenshot-2019-08-18-02-36-34.png
