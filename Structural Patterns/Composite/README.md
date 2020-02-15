## Composite

Composes objects into tree-like structures to represent a part-whole hierarchy.
Composite pattern lets clients treat compositions of objects and individual objects
the same.

#### Use the Composite pattern when:

- you need a part-whole hierarchy of objects.
- you want your program to treat individual objects and compositions of objects
  the same (have the under the same interface).

### General Structure

![General UML diagram of the Composite pattern][1]

#### Participants:

- **Component**: declares the interface for objects in the composition.  
  Optionally can be declared as an abstract class and implement the default behavior
  for the interface common to all classes.  
  Optionally can declare an interface for accessing and managing its child
  components. If you do that then the **Leaf** nodes which don't have children
  would have to implement child accessors as a no-op empty method.
  In the diagram above we choose to define child accessors only in the
  _Composite_ class. It has trade-offs - declaring child-related methods in
  the _Component_ interface would break the _Interface Segragation Principle_
  - since the _Leaf_ class would have to leave them empty, however declaring
  the same child-related methods only in the _Composite_ class slightly breaks the
  uniformity of the components.
- **Leaf**: components without children. Defines the behaviour for the primitive
  objects in the composition. They do most of the work since they don't
  delegate to anything else.
- **Composite**: also referred to as the _Container_. Defines the behavior for the
  components with children. Stores and accesses its children.  Delegates the
  work to its children which are all of _Component_ type, and processes/"sums"
  the results returned from its children.
- **Client**: manipulates objects in the composition through the _Component_
  interface. Can work with both primitive and composite objects, since they
  implement the same _Component_ interface.

### Our Example

![Our example UML diagram][2]

- **UIWidgetInterface** provides the _Component_ interface.  
- **UnorderedistWidget** and **OrderedListWidget** are our _Leaf_ components.
- **UIWidgetComposite** as its name implies - is our _Composite_ class which
  composes, accesses, calls render methods on our _Components_.
- **App** class acts as our _Client_ and operates on objects implementing
  _UIWidgetInterface_ - they could be primitive _Leafs_ or _Composites_ - our
  App doesn't need to distinguish, which is the goal of this pattern.

[1]: https://i.ibb.co/D4jQyZH/Composite.png
[2]: https://i.ibb.co/VYp5xnY/Composite-Example.png
