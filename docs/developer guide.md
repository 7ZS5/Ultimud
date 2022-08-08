# General
- Browser based.
- Made with html/css/javascript/php/sql.
- The world is made up of rooms. technically speaking, even just being in a city is a room, of which every building is just another room, so rooms, inside rooms, inside rooms, although I like to use the Region->area->local->room heirarchy.
- Properties of a room are Players, Monsters, NPCS, Static Objects(signs, statues), Dynamic objects(loot, chests, storable items), Connected rooms(including exits), and Monster encounter chance.

# Input and Output
- All activity happens in an output box, and this is how the player knows what's happening and what to type for an action.
- The output box has tabs for multiple types of output, World(which shows world events, weather, room events, sounds, player actions, movements, feedback from actions), NPC(dialogue and trading), Whispers(messages from other players), Battle, Guild, and Group.

# Actions & Commands
- All game actions are performed by concatenated strings, such as "move+exit", "eat+bread", "attack+5"(meaning attack the enemy with an index of 5). Shorthand abbreviation is important here.
- Movement is not performed by north, east, south, west, rather it is node based.

# UI
- There is a toolbar menu that consists of panes such as character, equipment, inventory, skills, magic, and a journal.
- There will be ASCII maps which can be loaded, but they are not navigated, just used as a reference for direction.

# Battle
- Attacking an enemy turns on automatic attack, so you only have to type the command once. Attack is performed by typing 'atk' + (index of enemy), so for example 'atk 1' or 'atk 3'.
- Once a player or their group engages into a battle, the output box blocks any activity feed unrelated to that battle, as to not get lost in what's happening in the fight.
- Battles are private so once you engage an enemy, that enemy is no longer shown or available to anyone in the room, unless they are in your group.
- There is a maximum of 8 enemies and 5 players in any battle. However Enemy groups can be up to 24, of which they will spawn into the battle after the current 8 are defeated.

# Rooms
- Some locations like a cave generally do not have other rooms inside of it. Rather, it will exist in layers. So, after exploring a cave for a while, you may find a tunnel which takes you down to the second layer of the cave which then shows as an exit that takes you to another room called Cave 2nd Layer.

# Exploring
-  When you first enter a room, not all the objects are immediately available. You have to do some exploring and looking of your own. Explore is a command in the game which essentially performs a few random checks. It checks for an enemy encounter, a treasure encounter, and discovering other objects like items or npcs hidden in the room.
