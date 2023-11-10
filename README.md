# speaker
## INTRODUCTION

The Speaker module is a DESCRIBE_THE_MODULE_HERE.

The primary use case for this module is:

- Create custom entity type (Speaker Profile)
- Create custom block that will output entity of custom entity type (Featured Profile)
- Creating custom template and display custom block in it

## REQUIREMENTS


## INSTALLATION
You can install it manually or with composer.

## CONFIGURATION
- After fresh installation, next step is creating custom module and entity. I used drush to generate both.
  
- CUSTOM ENTITY TYPE- SPEAKER PROFILE-
- For purpose of creating entity_reference, inside module file there is install() and create_custom_taxonomy(). Meaning of them is to programatically
- add vocabulary and couple of terms of that same vocabulary.
- Has 4 fields, string, text_long, entity_reference and image all of that is created in src/Entity/SpeakerProfile.php For user friendly url
- I used Pathauto module and created new url alias that overrieded url that has already given with ID. For that I used token that involves name
- of custom entity type.
- Bonus-
- Revision and translatations are cover when generating Entity. Plus adding setRevision and setTranslatable when defining fields inside custom Entity Type.
- Also defining revision_metadata_keys and adding @Translation when defining entity inside src/Profile/SpeakerProfile.php is a must.
- Speaker Details is added through CMS. That display mode is visible and is next to Default one. For custom entity I added view mode.
- Both of them are visible if you go to Structure/Speaker Profile.
  
- ADMIN INTERFACE-
- This interface is added when custom entity is generated. It is visible when you click on admin panel Content. It is called Speaker Profiles.
- When you click on it, you can see the list of entities of Speaker Profile. You can do CRUD. File which is edited for this purpose is speaker/src
- /SpeakerProfileListBuilder.php. I added fields that are showing on Speaker Profiles (id and name).
- Filters name and topics_of_expertise are made in custom Form src/Form/SpeakerProfileFilterForm.php. For them to be visible, they had to be rendered in render
- function inside speaker/src/SpeakerProfileListBuilder.php. Form is sending the value in a request which is used in getEntityIds() method inside speaker/src/
- SpeakerProfileBuilder.php When clicking on button Filter of Form, page is redirecting to the route of where the collection of custom entity type is with
- parameters catched in request.

- BLOCK - FEATURED SPEAKER-
- Custom block is being created in src/Plugin/FeaturedSpeakerBlock. EntityTypeManager is used to get custom entity type, then for random entity it is applied
- array_rand. Block is build with name, portrait and topics_of_expertise. Block is, after creating programatically, visible inside block layout and it gives freedom
- to put it wherever inside CMS. Caching is only added within $build that works on page reload.

- THEMING-
- Custom template inside custom module is in folder templates. For this purpose first theme() function inside module needs do define name of twig file and
- which variables that block wants to pass to twig. After that in file where Block created $random_entity (var) and theme are returned. For portrait image that is
- shown inside my-custom-block.html.twig custom image style needed to be added. It was added though CMS (Configuration > Media > Image styles). For purpose of adding
- new image_style I installed two modules css_editor and twig_tweak. Editor gives the option to add css directly to your theme to achive style that you want. And
- twig_tweak is used for some functionalites that are used inside twig (such as adding image_style).

## MAINTAINERS

Current maintainers for Drupal 10:

-Maja Bjelanović
