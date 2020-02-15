## Command

Encapsulates a request as an object. By _request_ we mean a _method call_ on
another object, passing all the necessary parameters into it. This lets us
_parametrize_ clients with different requests - meaning you can pass in
a _Command_ object which encapsulates the _request_ (method call) with all the
necessary parameters already "prepackaged" into it (as fields). In procedural
languages and the ones that allow first class functions we can accomplish the same
thing by using _callbacks_. You can define and include all the method calls you
want inside it and then call it when needed (perhaps even multiple times), pass it
around, return it, etc. _Command_ is a pure OOP version of a _callback_.  
If all the _Command_ objects inherit from the same interface - you can interchange
them to accomplish wildly different tasks - a client class to which we pass the
_Command_ object doesn't need to know the difference - it's decoupled from it.
Encapsulating _requests_ into _Command_ objects also lets us queue them, log
them, store them into a "command history" stack which we can use to implement the
"undo"/"redo" functionality.  
Also known as: **Action**, **Transaction**.

#### Use the Command pattern when:

- you want to _parametrize_ objects with an action to perform. Enapsulating
  a method call into a stand-alone object lets you pass it as an argument,
  store it, etc.
- you want to specify, schedule, queue and execute _requests_ at different
  times. Object serialization even allows you to store commands in a database
  and retrieve, execute them much later.
- you need support for reverting (undoing) the changes. _Command_ objects can
  store the application state before they execute operations and implement an
  _undo_ method (or something similar) to restore it. Then you can implement a
  command history stack where you store all the executed _Commands_, and if you
  need to revert the state - pop them off and call the respective _undo_ method.
  Reverting the state means executing the _undo_ operations in a reverse order -
  hence the _stack_ and its LIFO ("last in, first out") behavior.
- you want to structure your code using _high level_ operations that are based on
  primitive _low level_ operations. Each _Command_ can then define those high
  level operations and compose a multitude of low level operations inside them -
  such a structure lends itself well to systems which need _transactions_ -
  a _transaction_ encapsulates a set of changes (by the _low level_ operations) to
  the state.

### General Structure

![UML diagram of the Command pattern][1]

#### Participants:

- **Command**: declares an interface for all the commands. Usually declares
  just a single method for executing the given command, canonically called -
  _execute_.
- **ConcreteCommand**: implements the _Command_ inteface and the _execute()_
  method in it. Inside the method it can implement various kinds of _requests_.
  Parameters required for the _request_ are stored as class fields.
  _ConcreteCommand_ rarely performs the work on its own - it usually makes a
  method call to the necessary _Receiver_ object with the right parameters, thus
  fulfilling the _request_. Commands can be made immutable by allowing the
  initialization of the parameter fields and the _Receiver_ reference only in the
  constructor.
- **Invoker**: aka _Sender_, is responsible for initiating a _request_. It does
  so by triggering the _ConcreteCommand_ to carry out the _request_. _Invokers_
  themselves don't create and configure _ConcreteCommand_ - it's the _Client's_
  responsibility. The _Client_ creates one and passes it to the _Invoker_. The
  _Invoker_ triggers the command rather than sending the _request_ directly to
  the _Receiver_. Thus the _Command_ decouples senders from receivers and
  establishes a unidirectional connection between them.
- **Receiver**: knows how to perform the necessary operations associated with
  the _request_. Most _Commands_ only handle details of how the _request_ is
  passed to the _Receiver_. Any class may serve as a _Receiver_ - usually it
  deals with some back-end business logic and/or services.
- **Client**: creates and configures the _ConcreteCommand_ objects. It must
  pass all the necesary parameters and the _Receiver_ instance into the
  _ConcreteCommand_. Afterwards, the resulting _ConcreteCommand_ object can be
  passed in and associated with one or more _Senders_ which call the _execute()_
  method and trigger the _request_.

### Our Example

![Our example UML diagram][2]

- **ValidatorCommand** is our _Command_ interface. It declares a single
  _validate()_ method which is equivalent to the _execute()_ in the general
  structure example. All the _ConcreteCommands_ implement this interface.
- **BaseValidatorCommand** is an _abstract_ class which implements the
  _ValidatorCommand_ interface and is a supeclass for all our _ConcreteCommands_.
  It defines a _constructor_ for all of our _ConcreteCommands_, which takes in and
  stores a reference to an _ArrayValidator_ object.
- **LowerCaseValidatorCommand**, **UpperCaseValidatorCommand**,
  **NumericValidatorCommand**, are all the _ConcreteCommands_. Each of them stores
  a reference to the _ArrayValidator_ object (as a _Receiver_) and calls its
  operations when triggered via the _validate()_ method.
- **ArrayValidator** is our _Receiver_ object. It executes the actual logic.
  Its methods are invoked inside one of the _ConcreteCommand_ objects. It
  basically provides a couple of (very) simplistic validation methods for an array
  and its elements.
- **BaseController** is our _Invoker_. It holds a reference to one of the
  _ConcreteCommands_ and calls it to trigger the _request_. It's a "Base"
  Controller because it's meant to be extended by more specific child
  Controllers which can receive different validation commands (which in turn
  can, perhaps, refer to different array validators).
- **FrontController** is our _Client_. It instantiates an _ArrayValidator_
  (providing an actual array for it), passes it to one of the commands
  (_LowerCaseValidatorCommand_ in this case) - and then creates and configures the
  _BaseController_ with it.

This is a bit of a contrived example. We could've likely done without command
objects - by simply passing the _ArrayValidator_ straight into the _BaseController_.
As with all the _Patterns_ and their use - it depends on your specfic needs and
potential points of evolution/change in your application.  
_Command_ pattern lends itself well inside front-end applications - where you deal
with GUI elements and events - a single business operation may be invoked in a
mutlitude of ways - via a button or a key press, or via a context menu - it's best to
decouple the invocation from the sender, rather then fill sender objects themselves
with duplicate invocation logic - hence the _Command_ object.  
PHP mostly deals with request-response cycles, and here it's a bit harder to come
up with a good example - we don't deal with a GUI, however, _Command_ pattern may be
useful for tracking, queuing tasks while processing an incoming server request.

[1]: https://i.ibb.co/3SqKvrw/Command.png
[2]: https://i.ibb.co/k5LLF9H/Command-Example.png
