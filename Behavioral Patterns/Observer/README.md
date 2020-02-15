## Observer

Defines a one-to-many dependency betwen objects so that when one object changes
its state, all its dependents are notified and updated automatically.
The key objects in this pattern are the _subject_ (or _publisher_) and the
_observer_ (or _subscriber_). A _subject_ can have any number of dependent
_observers_. When the _subject's_ state changes or it executes some logic - it
notifies its _observers_.  
Also known as: **Publish-Subscribe, Dependents**.

#### Use the Observer pattern when:

- an abstraction has two aspects - with one dependent on the other. Encapsulating
  and putting these aspects in seperate objects lets you vary and reuse them
  independently.
- changes to the state of one object require changing other objects and the 
  actual set of objects is unknown beforehand, and can change during runtime.

### General Structure

![UML diagram of the Observer pattern][1]

#### Participants:

- **Subject**: provides an interface for attaching and detaching observers.
  Issues events for its observers (subscribers). In the diagram above shown as
  an interface, however it can be a concrete class if it's the only _Subject_
  in your system, or it can be an abstract class.  
  Also known as _Publisher_.
- **ConcreteSubject**: implements/inherits the _Subject_. Stores the relevant
  state, provides methods for attaching/detaching observers, and sends notifications
  to its observers.
- **Observer**: defines a common interface for the objects that can receive
  notifications from the _Subject_. Its _update_ method can be defined to receive
  arguments from the _Subject_ with some relevant event data, or even the _Subject_
  itself so that the _Observer_ can pull the relevant state/data itself.  
  In _GoF_ book there's a definition of two extremes - **push** and **pull**.
  At one extreme, which we have the **push model**, the _Subject_ sends observers
  detailed information about the change, whether they need it or not. At the
  other extreme is the **pull model** - the _Subject_ sends nothing but the most
  minimal notification, and observers ask for details explicitly thereafter.
  The **pull model** emphasizes the subject’s ignorance of its observers, whereas
  the **push model** assumes subjects know something about their observers’
  needs and therefore makes the observers more tightly coupled to their _Subject_.
  The **push model** might make observers less reusable, because _Subject_
  classes make more specific assumptions about _Observer_ classes. On the other
  hand, the **pull model** may be inefficient because _Observer_ classes must
  determine how the _Subject's_ state has changed without help from the _Subject_
  itself.  
  Also know as _Subscriber_.
- **ConcreteObserver**: performs actions in response to notifications issued by
  the _Subject_.

### Our Example

![Our example UML diagram][2]

- **PageController** acts as the _ConcreteSubject_. Since it's the only subject in 
  the system, I chose not to define a separate _Subject_ interface. PHP's
  Standard PHP Library (SPL) defines a
  [_SplSubject_](https://www.php.net/manual/en/class.splsubject.php) interface which
  you can use and implement in your projects.  
  PageController also makes use of the
  [_SplObjectStorage_](https://www.php.net/manual/en/class.splobjectstorage.php)
  class in which you can store objects - either as simple sets or as maps.  
- **ViewInterface** is our _Observer_. It specifies a single _render_ method
  through which the updates based on the received dara will happen.  Standard PHP
  Library (SPL) provides a
  [_SplObserver_](https://www.php.net/manual/en/class.splobserver.php) interface
  which you can implement in your projects.  
- **SimpleView** is our _ConcreteObserver_. It renders the data received as html -
  with all the proper character escapes.
- **App** acts as a _Client_. It creates the _PageController_ and subscribes
  a _SimpleView_ to it. Then it updates the _PageController_ a couple of times
  to see the _Observer Pattern_ in full effect.

[1]: https://i.ibb.co/RpCJTBz/Observer.png
[2]: https://i.ibb.co/FHhGHfV/Observer-Example.png 
