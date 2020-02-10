## State

A behavioral design pattern that allows an object to alter its behavior when
its internal state changes. It appers as if the object has changed its class.

#### Use the Strategy pattern when:

- your object needs to change its behavior when its state gets changed, and it
  happens frequently.
- you have massive conditional logic (_if, switch_) that determines the class'
  behavior based on its state, in other words - its field values. Each branch
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
  and provide implementation that is the same in multiple _ConcreteStates_ , thus
  avoiding duplication.
- **Client**: Uses the _Context_ object without worrying about state
  transitions and state-dependent behavior. It doesn't need to know anything about
  _State_ objects if the _Context_ can configure itself in its constructor or
  by other means (although it can make testing harder).

### Our Example

![Our example UML diagram][2]

- **...** ...
- **...** ...
- **...** ...

[1]: ...
[2]: ...
