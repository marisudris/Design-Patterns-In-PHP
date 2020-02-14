## State

A behavioral design pattern that allows an object to alter its behavior when
its internal state changes. It appers as if the object has changed its class.  
Also know as: **Objects for States**.

#### Use the State pattern when:

- your object needs to change its behavior when its state gets changed and it
  happens frequently.
- you have massive conditional logic (_if, switch_) that determines the class'
  behavior based on its state, or more precisely - its field values. Each branch
  of the conditional thus can be extracted into a separate state class or an
  abstract class if some of the state-related code is similar or duplicate.

### General Structure

![UML diagram of the State pattern][1]

#### Participants:

- **Context**: Defines the main interface that is used by the _Client_.  
  Stores and maintains a reference to a _ConcreteState_ instance, and delegates
  all the state-dependent work to it. Communicates to it only through the _State_
  interface and provides a setter for changing the state object, which can be
  used by the _ConcreteState_ to switch states and establish rules on how it's
  done and which state/-s can logically follow it.
- **State**: Defines the interface which all _ConcreteStates_ must implement.
  Provides state-specific methods that are guaranteed to exist on all state objects.
- **ConcreteState**: Implements the _State_ interface. May store a reference
  back to the _Context_ object so it can query it and switch the state object
  to another one, enabiling painless state transition. It can be an _abstract class_
  and provide implementation that is the same in multiple _ConcreteStates_, thus
  avoiding the code duplication.
- **Client**: Uses the _Context_ object without worrying about state
  transitions and state-dependent behavior. It doesn't need to know anything about
  _State_ objects if the _Context_ can configure itself in its constructor or
  by any other means (although it can make the testing harder).

### Our Example

![Our example UML diagram][2]

- **Order** is our _Context_ object. It holds a reference to an _OrderState_
  object and it can have four different states:
  - pending
  - ready
  - shipped
  - cancelled

  \- all of these are represented by separate state classes.  
  _Order_ delegates all of its methods to its state object, which takes
  care of the state transitions and date setting (if needed) for the _Order_.
- **OrderState** is our _State_ class. It's an abstract class which defines the
  interface for all the concrete state classes and provides a default implementation
  for all its methods. _getStatus()_ returns a status string which all of the
  states store as a constant, the rest of the methods are empty. Some of them
  stay empty in the concrete state classes since they don't make sense for them -
  like sending a cancelled or unprepared (pending) order, or cancelling
  a shipped order.
- **OrderPending**, **OrderReady**, **OrderShipped**, **OrderCancelled** are
  all the _ConcreteState_ classes in our example. _OrderPending_ and
  _OrderReady_ can transition to _OrderCancelled_ if _cancel()_ is called on an
  _Order_. _OrderPending_ can transition to _OrderReady_ when _prepare()_ is
  called on _Order_, and only _OrderReady_ can transition to _OrderShipped_ when
  _send()_ is called on _Order_. Both _OrderShipped_ and _OrderCancelled_ are
  _terminal_ states from which we can't transition to any other state anymore, so
  they don't define any state-specific behavior, they only inherit the empty
  defaults from the _OrderState_.
- **App** is our _Client_. It has a simple _run_ method where it creates an
  _Order_ and makes it undergo a couple of state changes.

[1]: https://i.ibb.co/XXv3LJ3/State.png
[2]: https://i.ibb.co/vJJmxcb/State-Example.png
