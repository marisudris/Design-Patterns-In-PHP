## Iterator

Provides a way to access the elements of an aggregate object in sequence,
without exposing its underlying implementation.  
Also known as **Cursor**.

#### Use the Iterator pattern when:

- you want to access a collection's (_aggregate object's_) contents without
  exposing its internal implementation.
- you want to support multiple types of traversals of aggregate objects, for
  instance, forwards, backwards, only certain elements determined by a filtering
  callback, etc.
- you need a uniform interface for traversing different types of aggregate
  structures (_polymorphic iteration_).

### General Structure

![UML diagram of the Strategy pattern][1]

#### Participants:

- **Iterator**: declares an interface for accessing and traversing _Aggregate's_ 
  (_Collection's_) elements.
- **ConcreteIterator**: implements the _Iterator_ interface and keeps/updates the
  current state of the traversal.
- **Aggregate**: defines an interface for creating and returning an _Iterator_.
- **ConcreteAggregate**: implements the _Aggregate_ interface and returns an
  appropriate _ConcreteIterator_.
- **Client**: works with both _Iterators_ and _Aggregates_ via their
  interfaces. This way the _Client_ isn't coupled to specific implementations
  allowing for multiple _Aggregates_ and _Iterators_ or even multiple
  _Iterators_ for a single _Aggregate_. _Clients_ typically get external iterators
  from respective _Aggregates_.

### Our Example

![Our example UML diagram][2]

- **Iterator** provides the _Iterator_. PHP provides it natively and defines
  a couple of methods one must implement - which we examine lower.
- **IteratorAggregate** is our _Aggregate_ interface. PHP provides it natively
  and we can take advantage of it. It declares a single _getIterator_ method that
  we must implement. An _Aggregate_ can create multiple types of iterators - we
  could define _getIterator_ as our our "main" iterator provider while adding a
  couple of other iterator creation methods for other types of iterators - like,
  one that goes reverse, another one that filters the elements etc.
- **MessageIterator** is our _ConcreteIterator_ which accesses and iterates over
  a collection of _Message_ objects from _MessageAggregate_. PHP provides
  a native _Iterator_ interface and our **MessageIterator** implements it.  
  PHP _Iterator_ interface declares 5 methods that we implement here:
  - _current_: returns the current element in the current iteration.
  - _key_: returns the key (pointer) of the current element in the iteration.
  - _next_: advances the pointer one position forward.
  - _rewind_: resets the iterator's pointer to it's initial position - in our
  example it's simply 0.
  - _valid_: returns _true_ if the pointer currently references an element,
  _false_ if there's no current element at the current position, in other words
  - our iteration has finished.
- **MessageAggregate** is our _ConcreteAggregate_ class. It implements the PHP's
  native _IteratorAggregate_ interface and implements it's _getIterator_ method. It
  defines some additional methods like _addMessage_ and _getMessages_ in case we
  simply want them all at once in a single array. We could think of and add some
  more methods that a typical _collection_ type class would need, but for the
  sake of simplicity I'll leave it as it is.

[1]: https://i.ibb.co/nMwfwQw/Iterator.png
[2]: https://i.ibb.co/g9FW9tc/Iterator-Example.png
