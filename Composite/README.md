## Composite

Compose objects into tree-like structures to represent part-whole hierarchies.
Composite pattern lets clients treat compositions of objects and individual objects
the same.

#### Use the Composite pattern when:
- you want to have and represent part-whole hierarchies of objects.
- you want you program to treat individual objects and compositions of objects
  the same.

### General Structure

![General UML diagram of the Composite pattern][1]

#### Participants:
- **Component**: declares the interface for objects in the composition.  
  Optionally can be declared as an abstract class and implement the default behavior
  for the interface common to all classes.  
  Optionally can declare an interface for accessing and managing its child
  components. If you do that then the **Leaf** nodes which don't have children
  would have to implement child accessors as some sort of no-op. In this
  diagram we choose to define child accessors only in the **Composite** class.
- **Leaf**: components without children. Defines behaviour for primitive
  objects in the composition. They do most of the work since they don't
  delegate to anyone else.
- **Composite**: also referred to as _Container_. Defines behavior for components 
  having children. Stores and accesses its children.  Delegates the work to
  its children which are all of _Component_ type, and processes the results
  returned from it's children.
- **Client**: manipulates objects in the composition through the _Component_
  interface. Can work with both primitive and composite objects, since they
  implement the same _Component_ interface.

### Our Example

![Our example UML diagram][2]

In our example the **UIWidgetInterface** provides the _Component_ interface.  
Both **UnorderedistWidget** and **OrderedListWidget** are out _Leaf_ components.
**UIWidgetComposite** as its name implies - is our _Composite_ class which
composes, accesses, call render methods on our _Components_.
**App** class acts as our _Client_ and operates on objects implementing
**UIWidgetInterface** - they could be primitive _Leafs_ or _Composites_ - our
App is not concerned with that, which is the goal of this pattern.

[1]: https://i.ibb.co/D4jQyZH/Composite.png
[2]: https://i.ibb.co/VYp5xnY/Composite-Example.png
