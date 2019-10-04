## Iterator

Provides a way to access the elements of an aggregate object in sequence
without exposing its underlying implementation.  
Also known as **Cursor**

#### Use the Iterator pattern when:
- you want to access and aggregate object's contents without exposing it's
  internal implementation.
- to support multiple types of traversals of aggregate objects, for instance,
  forwards, backwards, only certain elements determined by a filtering
  callback, etc.
- to provide a uniform interface for traversing different types of aggregate
  structures (polymorphic iteration).

### General Structure

![UML diagram of the Strategy pattern][1]

#### Participants:
- **Iterator**: declares an interface for accessing and traversing _Aggregate's_ 
  (sometimes referred to as _Collection_) elements.
- **ConcreteIterator**: implements th _Iterator_ interface and keeps/updates the
  current state of the traversal of the _Aggregate_
- **Aggregate**: defines an interface for creating an _Iterator_.
- **ConcreteAggregate**: implements the _Aggregate_ interface and returns an
  appappropriate _ConcreteIterator_ which implements _Iterator_ interface.
- **Client**: works with both _Iterators_ and _Aggregates_ via their
  interfaces. This ways the _Client_ isn't coupled to specific implementations
  allowing for multiple _Aggregates_ and _Iterators_ or even multiple
  _Iterators_ for a single _Aggregate_.
  _Clients_ typically get external iterators from respective _Aggregates_.

### Our Example

![Our example UML diagram][2]

** ** ...

[1]: https://i.ibb.co/nMwfwQw/Iterator.png
[2]:
