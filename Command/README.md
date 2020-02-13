## State

Encapsulates a request as an object. By _request_ we mean a _method call_ into
another object, passing all the necessary parameters into it. This lets us
_parametrize_ clients with different requests - meaning you can pass in
a _Command_ object which encapsulates the _request_ (method call) with all the
necessary parameters already "prepackaged" into it (as fields). In procedural
languages and the ones that allow first class functions we can accomplish the same
thing by using _callbacks_. You can define and include all the method calls you
want inside it and then call it when needed (perhaps even multiple times), pass it
around, etc. _Commands_ are a pure OOP verions of _callbacks_.  
If all the _Command_ objects inherit from the same interface - you can interchange
them to accomplish wildly different tasks - the _client_ to which we pass the
_Command_ object doesn't need to know the difference - it's decoupled from them.
Encapsulating _requests_ into _Command_ objects also lets us queue them, log
them, store the into a "command history" stack which we can use to implement the
"undo"/"redo" functionality.

#### Use the Strategy pattern when:

- you want to _parametrize_ objects with an action to perform. Enapsulating
  a method call into a stand-alone object lets you pass it as an argument,
  store it, etc.
- you want to specify, schedule, queue and execute _requests_ at different
  times. Object serialization even allows you to store commands in a database
  and retrieve, execute them much later.
- you need support of reverting (undoing) the changes. _Command_ objects can
  store the application state before they execute operations and implement an
  _undo_ method (or something similar). Then you can implement a command history
  stack where you store all the executed _Commands_, and if you need to revert
  the state - pop them off and call the respective _undo_ method. Reverting the
  state means executing the _undo_ operations in a reverse order - hence the stack.
- you want to structure your code on _high level_ operations that are based on
  primitive _low level_ operations. Each _Command_ can then define those high
  level operations and compose a multitude of low level operations inside them -
  such a structure lends itself well to systems which need _transactions_ -
  a _transaction_ encapsulates a set of changes to the state.

### General Structure

![UML diagram of the Command pattern][1]

#### Participants:

- **Command**: declares an single interface for all the commands. Usually declares
  just a single method for executing the given command, often called - _execute_.
- **ConcreteCommand**: implements the _Command_ inteface and the _execute_
  method in it. Inside the method it can implement various kinds of _requests_.
  Parameters required for the _request_ are stored here as class fields.
  _ConcreteCommand_ rarely performs the work on its own - it usually makes a
  method call to the necessary _Receiver_ object with the right parameters thus
  fulfilling the _request_. Commands can be made immutable by allowing the
  initialization of the parameter fields and the _Receiver_ reference only in the
  constructor.
- **Invoker**: aka _Sender_, is responsible for initiating the _request_. It does
  so by triggering the _ConcreteCommand_ to carry out the _request_. _Invokers_
  themselves don't create and configure _ConcreteCommand_ - it's the _Clients_
  responsibility. The _Client_ creates one and passes it to the _Invoker_. The
  _Invoker_ triggers the command rather than sending the _request_ directly to
  the _Receiver_. _Command_ decouples senders from receivers and establishes
  a unidirectional connection between them.
- **Receiver**: knows how to perform the necessary operations associated with
  the _request_. Most _Commands_ only handle details of how the _request_ is
  passed to the _Receiver_. Any class may serve as a _Receiver_ - mostly it
  deals with some back-end business logic.
- **Client**: creates and configures the _ConcreteCommand_ objects. It must
  pass all the necesary parameters and the _Receiver_ instance into the
  _ConcreteCommand_. Afterwards - the resulting _ConcreteCommand_ object can be
  passed and associated with one or more _Senders_ which call the _execute()_
  operation on it.

### Our Example

![Our example UML diagram][2]

- **ValidatorCommand** is our _Command_ interface. It declares a single
  _validate()_ method which is equivalent to _execute()_ in the general
  structure. All _ConcreteCommands_ must implement this interface.
- **BaseValidatorCommand** is an _abstract_ class which implements the
  _ValidatorCommand_ interface and is a supeclass for all our _ConcreteCommands_.
  It defines a _constructor_ for all of our _ConcreteCommands_, it takes and
  stores a reference to an _ArrayValidator_ object.
- **NumericValidatorCommand**, **LowerCaseValidatorCommand**,
  **UpperCaseValidatorCommand** are the _ConcreteCommands_. Each of them store
  a reference to an _ArrayValidator_ object as a _Receiver_ and call its
  operations accordingly.
- **ArrayValidator** is our _Receiver_ object. It executes the actual logic,
  its methods getting invoked inside one of the _ConcreteCommand_ objects. It
  basically provides a couple of (very) simplistic validation methods for array
  and its elements.
- **App** is our _Invoker_. It instantiates an _ArrayValidator_ (providing an
  actual array for it), passes it to one of the commands
  (_LowerCaseValidatorCommand_ in this case) - and calls the command's
  _validate()_ method.

[1]: https://i.ibb.co/3SqKvrw/Command.png
[2]: ...
