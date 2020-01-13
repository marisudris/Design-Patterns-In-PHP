## Observer

Define a one-to-many dependency betwen objects so that when one object changes
state, all its dependents are notified and updated automatically.
The key objects in this pattern are _subject_ (or _publisher_) and _observer_
(or _subscriber_). A _subject_ can have any number of dependent _observers_.
When the _subject_ changes state or executes some logic - it can notifies all of
its _observers_.  
Also known as: **Publish-Subscribe, Dependents**.

#### Use the Observer pattern when:

- an abstraction has two aspects - one dependent on the other. Encapsulating an
  putting these aspects in seperate objects lets you vary and reuse them
  independently.
- changes to the state of one object require changing other objects, and the 
  actual set of objects is unknown beforehand, and can change during runtime.

### General Structure

![UML diagram of the Observer pattern][1]

#### Participants:

- **Subject**: provides an interface for attaching and detaching observers.
  Issues events for its observers (subscribers). In the diagram above shown as
  an interface, however it can be a concrete class if it's the only _Subject_
  in your system, or an abstract class.  
  Also known as **Publisher**.
- **ConcreteSubject**: inherits the _Subject_ interface. Stores the relevant
  state and sends notifications to its observers.
- **Observer**: defines a common interface for the objects that can receive
  notifications from the _Subject_. Its _update_ method can be defined to receive
  arguments from the _Subject_ with some relevant event data, or even the _Subject_
  itself so that the _Observer_ can pull the relevant state/data itself.  
  Also know as **Subscriber**.
- **ConcreteObserver**: performs actions in response to notifications issued by
  the _Subject_.

### Our Example

![Our example UML diagram][2]

- **PageController** acts as the _ConcreteSubject_. Since it's the only subject in 
  the system, I chose not to define a separate _Subject_ interface. PHP's
  Standard PHP Library (SPL) defines a
  [_SplSubject_](https://www.php.net/manual/en/class.splsubject.php) interface which
  you can implement.  
  PageController also makes use of the
  [_SplObjectStorage_](https://www.php.net/manual/en/class.splobjectstorage.php)
  class in which you can store objects - either as simple sets or as maps.  
- **ViewInterface** is our _Observer_. It specifies a single _render_ method
  through which the updates based on the received dara will happen.  Standard PHP
  Library (SPL) provides a
  [_SplObserver_](https://www.php.net/manual/en/class.splobserver.php) interface
  which you can implement.  
- **SimpleView** is our _ConcreteObserver_. It renders the data received as html -
  with all the proper escaping.

[1]: https://i.ibb.co/RpCJTBz/Observer.png
[2]: https://i.ibb.co/SQWjqR4/Screenshot-2019-08-22-04-46-57.png
