## General:
- Browser based
- Made with html/css/javascript
- The game is essentially also serving as a chat room
- The world is made up of rooms. technically speaking, even just being in a city is a room, of which every building is just another room, so rooms, inside rooms, inside rooms, although I like to use the Region->area->local->room heirarchy.
- Properties of a room are Players, Monsters, NPCS, Static Objects(signs, statues), Dynamic objects(loot, chests, storable items), Connected rooms(including exits), and Monster encounter chance

## Input and Output:
- All activity happens in an output box, and this is how the player knows what's happening and what to type for an action
- The output box has tabs for multiple types of output, World(which shows world events, weather, room events, sounds, player actions, movements, feedback from actions), NPC(dialogue and trading), Whispers(messages from other players), Battle, Guild, and Group

## Actions & Commands:
- All game actions are performed by concatenated strings, such as "move+exit", "eat+bread", "attack+5"(meaning attack the enemy labeled with the #5). Shorthand abbreviation is important here.
- Movement is not performed by north, east, south, west, rather a move command which lists any available buildings, paths, or exits

## UI: 
- There is a toolbar menu that consists of panes such as character, equipment, inventory, skills, magic, and a journal
- There will be ASCII maps which can be loaded, but they are not navigated, just used as a reference for direction

## Battle:
- Attacking an enemy turns on automatic attack, so you only have to type the command once. Attack is performed by typing 'atk' + (index of enemy), so for example 'atk 1' or 'atk 3'.
- Once a player or their group engages into a battle, the output box blocks any activity feed unrelated to that battle, as to not get lost in what's happening in the fight
- Battles are private so once you engage an enemy, that enemy is no longer shown or available to anyone in the room, unless they are in your group
